<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

class FormGroup extends Element\Div
{	
	protected $classBase = 'form-group';
	
	public function __construct(Element\Label $label, Bootstrap3\Size $size = null)
	{
		parent::__construct();
		
		parent::add($label);
		
		if(isset($size))
		{
			parent::addClass($this->classBase . '-' . $size);
		}
	}
	
	public function add($contents, $prepend = false)
	{	
		if(is_a($contents, 'Fuse\Document\Element\Bootstrap\Bootstrap3\Input'))
		{
			$reflectionClass = new \ReflectionClass(new Bootstrap3\Size(null));
			
			foreach($reflectionClass->getConstants() as $key => $value)
			{
				$contents->removeClass($contents->classBase . '-' . $value);
			}
		}
		
		parent::add($contents, $prepend);
		
		return $this;
	}
}