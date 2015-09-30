<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class Breakpoints
{
	public $xs;
	
	public $sm;
	
	public $md;
	
	public $lg;
	
	public function __construct($xs = null, $sm = null, $md = null, $lg = null)
	{
		$this->xs = $xs;
		$this->sm = $sm;
		$this->md = $md;
		$this->lg = $lg;
	}
}