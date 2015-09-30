<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Thumbnail extends Element
{	
	protected $classBase = 'thumbnail';
	
	public function __construct($tag = 'div', Element\Image $image = null)
	{
		$this->tag = $tag;
		
		parent::__construct();
		
		parent::add($image);
	}
	
	public function add($contents, $prepend = false)
	{
		if(!isset($this->contents[1]))
		{
			$contentDiv = new Element\Div;
			$contentDiv->addClass('caption');
			
			parent::add($contentDiv);
		}
		
		$this->contents[1]->add($contents, $prepend);
		
		return $this;
	}
}