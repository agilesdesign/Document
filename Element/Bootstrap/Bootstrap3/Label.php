<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class Label extends Element\Label
{
	public function __construct($form = false)
	{
		parent::__construct();
		
		if($form)
		{
			parent::addClass('control-label');
		}
	}
}