<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class Abbreviation extends Element\Abbreviation
{
	public function __construct($title, $initialism = false)
	{	
		parent::__construct($title);
		
		if($initialism)
		{
			parent::addClass('initialism');
		}
	}
}