<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class Blockquote extends Element\Blockquote
{	
	public function __construct($reverse = false)
	{	
		parent::__construct();
		
		$this->classBase = 'blockquote';
		
		if($reverse)
		{
			parent::addClass($this->classBase . '-reverse');
		}
	}
}