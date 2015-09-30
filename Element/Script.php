<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Script extends Element
{
	const tag = 'script';
	
	protected $tag = self::tag;
	
	public function __construct($type = null, $src = null, $defer = false, $async = false)
	{
		parent::__construct();
		
		if(isset($src))
		{
			parent::setAttribute('src', $src);
		}
		
		if(isset($type))
		{
			parent::setAttribute('type', $type);
		}
		
		if($defer)
		{
			parent::setAttribute('defer', $defer);
		}
		
		if($async)
		{
			parent::setAttribute('async', $async);
		}
	}
}