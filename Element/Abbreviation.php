<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Blockquote extends Element
{
	const tag = 'abbr';
	
	protected $tag = self::tag;
	
	public function __construct($title)
	{
		parent::__construct();
		
		parent::setAttribute('title', $title);
	}
}