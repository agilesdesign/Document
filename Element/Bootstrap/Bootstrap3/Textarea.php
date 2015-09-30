<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class Textarea extends Element\Textarea
{
	public function __construct($placeholder = null, $rows = null)
	{
		parent::__construct($placeholder, $rows);
		
		parent::addClass('form-control');
	}	
}