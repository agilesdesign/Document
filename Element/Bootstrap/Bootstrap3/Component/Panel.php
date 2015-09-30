<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Panel extends Element\Div
{	
	protected $classBase = 'panel';
	
	public function __construct($context = 'default', Element\Div $heading = null, Element\Div $body = null, Element\Div $footer = null, $seamlessContent = null)
	{	
		parent::__construct();
		
		parent::addClass($this->classBase . '-' . $context);
		
		if(isset($heading))
		{
			$heading->addClass($this->classBase . '-heading');
			parent::add($heading, false);
		}
		
		if(isset($body))
		{
			$body->addClass($this->classBase . '-body');
			parent::add($body, false);
		}
		
		if(isset($seamlessContent))
		{
			parent::add($seamlessContent, false);
		}
		
		if(isset($footer))
		{
			$footer->addClass($this->classBase . '-footer');
			parent::add($footer, false);
		}
	}
}