<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class TableRow extends Element\TableRow
{	
	public function __construct($context = null)
	{	
		parent::__construct();
		
		if(isset($context))
		{
			parent::addClass($context);
		}
	}
}