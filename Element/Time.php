<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Time extends Element
{
	const tag = 'time';
	
	protected $tag = self::tag;
	
	public function __construct($datetime)
	{
		parent::__construct();
		
		parent::setAttribute('datetime', $datetime);
	}
}