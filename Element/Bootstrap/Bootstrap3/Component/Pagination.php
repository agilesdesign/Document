<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

class Pagination extends Element\Nav
{
	public function __construct(Bootstrap3\Size $size = null)
	{
		parent::__construct();
		
		$unorderedList = new Element\UnorderedList();
		$unorderedList->addClass('pagination');
		
		if(isset($size))
		{
			$unorderedList->addClass('pagination-' . $size);
		}
		
		parent::add($unorderedList);
	}
	
	public function add($contents, $prepend = false)
	{
		$this->contents[0]->add($contents, $prepend);
		
		return $this;
	}
}