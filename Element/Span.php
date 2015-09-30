<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Span extends Element
{
	const tag = 'span';
	
	protected $tag = self::tag;
	
	public function __construct()
	{	
		parent::__construct();
		
	}
}