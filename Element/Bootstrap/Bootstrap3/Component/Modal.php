<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

class Modal extends Element\Div
{
	protected $classBase = 'modal';
	
	public function __construct($animate = 'fade', Bootstrap3\Size $size, Button $closeButton = null, $id = null, $options = null)
	{
		parent::__construct();
		
		parent::addClass($animate);
		
		if(isset($id))
		{
			parent::setAttribute('id', $id);
		}
		
		$content = new Element\Div();
		$content->addClass($this->classBase . '-content');
		
		$dialog = new Element\Div();
		$dialog->addClass($this->classBase . '-dialog')
			->addClass($this->classBase . '-' . $size);
		
		$dialog->add($content);
		
		parent::add($dialog);
		
		if(isset($closeButton))
		{
			$closeButton->addClass('close')
				->setAttribute('data-dismiss', 'modal');
			
			$this->addContent($closeButton, 'header');
		}
		
		if(is_array($options))
		{
			$options['backdrop'] = isset($options['backdrop']) ? $options['backdrop'] : true;
			$options['keyboard'] = isset($options['keyboard']) ? (boolean) $options['keyboard'] : true;
			$options['show'] = isset($options['show']) ? (boolean) $options['show'] : true;
			
			parent::addJQuery('carousel', json_encode($options));
		}
	}
	
	public function addContent($contents, $section = 'body', $prepend = false)
	{
		$sectionIndex = 1;
		
		switch($section)
		{
			case 'header':
				$sectionIndex = 0;
				break;
			case 'body':
				$sectionIndex = 1;
				break;
			case 'footer':
				$sectionIndex = 2;
				break;
			default:
				$sectionIndex = 1;
		}
		
		if(!isset($this->contents[0]->contents[0]->contents[$sectionIndex]))
		{
			$sectionDiv = new Element\Div();
			$sectionDiv->addClass($this->classBase . '-' . $section);
			
			$this->contents[0]->contents[0]->contents[$sectionIndex] = $sectionDiv;
		}
		
		$this->contents[0]->contents[0]->contents[$sectionIndex]->add($contents, $prepend);
		
		return $this;
	}
}