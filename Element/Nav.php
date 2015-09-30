<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Nav extends Element
{
	const tag = 'nav';
	
	protected $tag = self::tag;
	
	public function __construct()
	{	
		parent::__construct();
	}
}