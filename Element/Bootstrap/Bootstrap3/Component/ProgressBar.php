<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class ProgressBar extends Element\Div
{	
	protected $classBase = 'progress-bar';
	
	public function __construct($context = 'primary', $fillValue = 0, $striped = false, $animated = false)
	{	
		parent::__construct();
		
		parent::addClass($this->classBase . '-' . $context);
		
		parent::addStyle('width', $fillValue . '%');
		
		parent::setAttribute('role', 'progressbar');
		
		if($striped || $animated)
		{
			parent::addClass($this->classBase . '-striped');
		}
		
		if($animated)
		{
			parent::addClass('active');
		}
	}
}