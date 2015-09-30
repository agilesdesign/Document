<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Container extends Element\Div
{
	protected $classBase = 'container';
	
	public function __construct($fluid = false)
	{
		if($fluid)
		{
			$this->classBase .= '-fluid';
		}
		
		parent::__construct();
		
		parent::addClass($this->classBase);
	}
}