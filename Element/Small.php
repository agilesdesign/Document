<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Small extends Element
{
	const tag = 'small';
	
	protected $tag = self::tag;
	
	public function __construct()
	{	
		parent::__construct();
	}
}