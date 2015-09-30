<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class Preformatted extends Element\Preformatted
{	
	public function __construct($scrollable = false)
	{	
		parent::__construct($title);
		
		if($scrollable)
		{
			parent::addClass($this->tag . '-scrollable');
		}
	}
}