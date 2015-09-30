<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

defined('JPATH_PLATFORM') or die;

class InlineFrame extends Element
{	
	const tag = 'iframe';
	
	protected $tag = self::tag;
	
	public function __construct($src)
	{	
		parent::__construct();
		
		parent::setAttribute('src', $src);
	}
}