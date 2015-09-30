<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class ListGroup extends Element
{	
	protected $classBase = 'list-group';
	
	protected $childClassBase = 'list-group-item';
	
	public function __construct($tag = 'ul')
	{
		$this->tag = $tag;
		
		parent::__construct();
	}
	
	public function addItem(Element\ListItem $contents, $prepend = false, $context = null, $active = false, $disabled = false)
	{
		$contents->addClass($this->childClassBase);
		
		if($active)
		{
			$contents->addClass('active');
		}
		
		if($disabled)
		{
			$contents->addClass('disabled');
		}
		
		if(isset($context) && !$active && !$disabled)
		{
			$contents->addClass($this->childClassBase . '-' . $context);
		}
		
		// TODO: iterate through children of contents and add heading/text class(es)
		$contents = Element\Helper::fixChildrenClass($contents, 'Paragraph', 'list-group-item-text');
		$contents = Element\Helper::fixChildrenClass($contents, 'Header', 'list-group-item-heading');
		
		parent::add($contents, $prepend);
		
		return $this;
	}
}