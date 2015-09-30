<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Label extends Element\Span
{
	protected $classBase = 'label';
	
	public function __construct($context = 'default')
	{
		parent::__construct();
		
		parent::addClass($this->classBase . '-' . $context);
	}
}