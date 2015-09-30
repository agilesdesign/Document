<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Glyphicons\Glyphicons1 as Glyphicons1;

class Carousel extends Element\Div
{
	protected $classBase = 'carousel';
	
	protected $id;
	
	protected $indicators;
	
	public function __construct($id, $controls = true, $indicators = true, $animate = 'slide', $options = null)
	{
		$this->id = $id;
		$this->indicators = $indicators;
	
		parent::__construct();
		
		parent::addClass($animate);
		
		parent::setAttribute('id', $id);
		parent::setAttribute('data-ride', 'carousel');	
		
		//indicators
		$indicatorsOrderedList = new Element\OrderedList;
		
		$indicatorsOrderedList->addClass('carousel-indicators');
		
		//inner
		$inner = new Element\Div;
		
		$inner->addClass('carousel-inner');
		
		$inner->setAttribute('role', 'listbox');
		
		parent::add($indicatorsOrderedList);
		parent::add($inner);
		
		//control
		if($controls)
		{
			$previousItem = new Element\Anchor('#' . $id);
			$previousItem->addClass('left')
				->addClass('carousel-control')
				->setAttribute('role', 'button')
				->setAttribute('data-slide', 'prev')
				->add(new Glyphicons1\Icon('chevron-left'));
			
			$nextItem = new Element\Anchor('#' . $id);
			$nextItem->addClass('right')
				->addClass('carousel-control')
				->setAttribute('role', 'button')
				->setAttribute('data-slide', 'next')
				->add(new Glyphicons1\Icon('chevron-right'));
			
			parent::add($previousItem);
			parent::add($nextItem);
		}
		
		if(is_array($options))
		{
			$options['interval'] = isset($options['interval']) ? (int) $options['interval'] : 5000;
			$options['pause'] = isset($options['pause']) ? (string) $options['pause'] : 'hover';
			$options['wrap'] = isset($options['wrap']) ? (boolean) $options['wrap'] : true;
			$options['keyboard'] = isset($options['keyboard']) ? (boolean) $options['keyboard'] : true;
			
			parent::addJQuery('carousel', json_encode($options));
		}
	}
	
	public function add($item, $prepend = false)
	{
		$count = count($this->contents[0]->contents);
		
		$item->addClass('item');
		
		// create indicator & add item
		if($this->indicators)
		{
			$indicator = new Element\ListItem;
			
			$indicator->setAttribute('data-target', '#' . $this->id);
			$indicator->setAttribute('data-slide-to', $count);
			
			// first indicator & item is always active
			if($count < 1)
			{
				$item->addClass('active');
				$indicator->addClass('active');
			}
			
			// add indicator
			$this->contents[0]->add($indicator, $prepend);
			
			// add item
			$this->contents[1]->add($item, $prepend);
			
			return $this;
		}
		
		// first item is always active
		if($count < 1)
		{
			$item->addClass('active');
		}
		
		// add item
		$this->contents[0]->add($item, $prepend);
		
		return $this;
	}
}