<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class MediaList extends Element\UnorderedList
{	
	protected $classBase = 'media-list';
	
	public function addItem(Media $item, $prepend = false)
	{
		parent::add($item, $prepend);
		
		return $this;
	}
}