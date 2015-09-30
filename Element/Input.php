<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Input extends Element
{
	const tag = 'input';
	
	protected $tag = self::tag;
	
	protected $singleton = true;
	
	public function __construct($type, $name, $readonly = false, $disabled = false)
	{	
		parent::__construct();
		
		parent::setAttribute('type', $type);
		parent::setAttribute('name', $name);
		
		if($readonly)
		{
			parent::setAttribute('readonly', '');
		}
		
		if($disabled)
		{
			parent::setAttribute('disabled', '');
		}
	}
}