<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

class Well extends Element\Div
{	
	protected $classBase = 'well';
	
	public function __construct(Bootstrap3\Size $size = null)
	{
		parent::__construct();
		
		if(isset($size))
		{
			parent::addClass($this->classBase . '-' . $size);
		}
	}
}