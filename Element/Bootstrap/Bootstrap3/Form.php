<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class Form extends Element\Form
{
	public function __construct($alignment = null)
	{
		parent::__construct();
		
		if(isset($alignment))
		{
			$this->classBase = 'form';
			
			parent::addClass($this->classBase . '-' . $alignment);
		}
	}	
}