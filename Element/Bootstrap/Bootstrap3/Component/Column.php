<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

class Column extends Element\Div
{
	public function __construct(Bootstrap3\Breakpoints $spans, Bootstrap3\Breakpoints $offsets = null)
	{
		parent::__construct();
		
		// element shouldn't automatically get classBase added as a class still should be a property of this object though
		$this->classBase = 'col';
		
		foreach(get_object_vars($spans) as $breakpoint => $span)
		{
			if(isset($span) && $span != '')
			{
				$this->addSize($breakpoint, $span);
			}
		}
		
		if(isset($offsets))
		{
			foreach(get_object_vars($offsets) as $breakpoint => $span)
			{
				if(isset($span) && $span != '')
				{
					$this->addOffset($breakpoint, $span);
				}
			}
		}
	}
	
	public function addSize($breakpoint, $span)
	{
		parent::addClass($this->classBase . '-' . $breakpoint . '-' . $span);
		
		return $this;
	}
	
	public function addOffset($breakpoint, $span)
	{
		parent::addClass($this->classBase . '-' . $breakpoint . '-offset-' . $span);
		
		return $this;
	}
}