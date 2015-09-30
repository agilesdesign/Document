<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Anchor extends Element
{
	const tag = 'a';
	
	protected $tag = self::tag;
	
	public function __construct($uri)
	{	
		parent::__construct();
		
		$this->setAttribute('href', $uri);
	}
}