<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class Input extends Element\Input
{
	public function __construct($type, $name, Size $size = null, $readonly = false, $disabled = false)
	{	
		parent::__construct($type, $name, $readonly, $disabled);
		
		$this->classBase = 'input';
		
		if($type == 'text' || $type == 'password')
		{
			parent::addClass('form-control');
		}
		
		if(isset($size))
		{
			parent::addClass($this->classBase . '-' . $size);
		}
	}
}