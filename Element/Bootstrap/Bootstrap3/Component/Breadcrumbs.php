<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Breadcrumbs extends Element\UnorderedList
{
	protected $classBase = 'breadcrumb';
	
	public function addBreadcrumb(Element\ListItem $item)
	{
		parent::add($item);
		
		return $this;
	}
}
