<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Image extends Element
{
	const tag = 'img';
	
	protected $tag = self::tag;
	
	protected $singleton = true;
	
	public function __construct($src)
	{	
		parent::__construct();
		
		$this->setAttribute('src', $src);
	}
}