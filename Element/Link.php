<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Link extends Element
{
	const tag = 'link';
	
	protected $tag = self::tag;
	
	protected $singleton = true;
	
	public function __construct($href, $rel, $type = null)
	{
		parent::__construct();
		
		parent::setAttribute('href', $href);
		parent::setAttribute('rel', $rel);
		
		if(isset($type))
		{
			parent:setAttribute('type', $type);
		}
	}
}