<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Italic extends Element
{
	const tag = 'i';
	
	protected $tag = self::tag;
	
	public function __construct()
	{	
		parent::__construct();
		
	}
}