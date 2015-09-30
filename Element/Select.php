<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Select extends Element
{
	const tag = 'select';
	
	protected $tag = self::tag;
	
	public function __construct($multiple = false)
	{
		parent::__contruct();
		
		if($multiple)
		{
			parent::setAttribute('multiple', '');
		}
	}
}