<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Pager extends Element\Nav
{	
	public function __construct(Element\ListItem $nextItem = null, Element\ListItem $previousItem = null, $align = false)
	{
		parent::__construct();
		
		if($align)
		{
			$nextItem->addClass('next');
			$previousItem->addClass('previous');
		}
		
		$unorderedList = new Element\UnorderedList();
		
		$unorderedList->addClass('pager')
			->add($previousItem)
			->add($nextItem);
		
		parent::add($unorderedList);
	}
}