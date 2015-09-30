<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class ButtonToolbar extends Element\Div
{
	public $classBase = 'btn-toolbar';
	
	public function __construct()
	{	
		parent::__construct();
		
		parent::setAttribute('role', 'toolbar');
	}
}