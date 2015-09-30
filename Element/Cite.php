<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Cite extends Element
{
	const tag = 'cite';
	
	protected $tag = self::tag;
	
	public function __construct($title)
	{
		parent::construct();
		
		parent::setAttribute('title', $title);
	}
}