<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class UnorderedList extends Element
{
	const tag = 'ul';
	
	protected $tag = self::tag;
	
	public function __construct()
	{
		parent::__construct();
	}
}