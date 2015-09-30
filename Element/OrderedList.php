<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class OrderedList extends Element
{
	const tag = 'ol';
	
	protected $tag = self::tag;
	
	public function __construct()
	{
		parent::__construct();
	}
}