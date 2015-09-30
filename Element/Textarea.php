<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Textarea extends Element
{
	const tag = 'textarea';
	
	protected $tag = self::tag;
	
	public function __construct($placeholder = null, $rows = null)
	{
		parent::__construct();
		
		if(isset($placeholder))
		{
			parent::setAttribute('placeholder', $placeholder);
		}
		
		if(isset($rows))
		{
			parent::setAttribute('rows', $rows);
		}
	}
}