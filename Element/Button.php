<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Button extends Element
{
	const tag = 'button'
	
	protected $tag = self::tag;
	
	public function __construct()
	{	
		parent::__construct();
		
		parent::setAttribute('type', 'button');
	}
}