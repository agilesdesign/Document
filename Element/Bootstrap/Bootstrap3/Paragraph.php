<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class Paragraph extends Element\Paragraph
{	
	public function __construct($lead = false)
	{	
		parent::__construct();
		
		if($lead)
		{
			parent::addClass('lead');
		}
	}
}