<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

class ButtonGroup extends Element\Div
{	
	public function __construct(Bootstrap3\Size $size, $vertical = false, $justified = false)
	{
		parent::__construct();
		
		$this->classBase = 'btn-group';
		
		parent::addClass($this->classBase . '-' . $size);
		
		parent::setAttribute('role', 'group');
		
		if($justified)
		{
			parent::addClass($this->classBase . '-justified');
		}
		
		// instantiate element with proper base class
		if($vertical)
		{
			parent::addClass($this->classBase . '-vertical');
			
			return;
		}
		
		parent::addClass($this->classBase);
	}
	
	public function addButton(Button $button)
	{
		parent::add($button);
		
		return $this;
	}
}
