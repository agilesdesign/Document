<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Header extends Element
{
	const tag = 'h';
	
	protected $tag = self::tag;
	
	public function __construct($size = 1)
	{	
		if(is_string($size))
		{
			$size = substr($size, 1, 1);
		}
		
		$this->tag = $this->tag . $size;
		
		parent::__construct();
	}
}