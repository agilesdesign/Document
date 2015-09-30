<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Alert extends Element\Div
{	
	protected $classBase = 'alert';
	
	public function __construct($context, Button $button = null)
	{	
		parent::__construct();
		
		parent::addClass($this->classBase . '-' . $context);
		
		parent::setAttribute('role', 'alert');
		
		if(isset($button))
		{
			$button->addClass('close')
				->setAttribute('data-dismiss', 'alert');
			
			parent::addClass($this->classBase . '-dismissible');
			
			parent::add($button);
		}
	}
	
	public function add($contents, $prepend = false)
	{
		$contents = Element\Helper::fixChildrenClass($contents, 'Anchor', 'alert-link');
		
		parent::add($contents, $prepend = false);
		
		return $this;
	}
}