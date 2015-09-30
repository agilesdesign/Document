<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Progress extends Element\Div
{	
	protected $classBase = 'progress';
	
	public function addBar(ProgressBar $bar, $prepend = false)
	{
		parent::add($bar, $prepend);
		
		return $this;
	}
}