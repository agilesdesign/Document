<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class OrderedList extends Element\OrderedList
{	
	public function __construct($inline = false, $unstyled = false)
	{	
		parent::__construct();
		
		if($inline)
		{
			parent::addClass('list-inline');
		}
		
		if($unstyled)
		{
			parent::addClass('list-unstyled');
		}
	}
}