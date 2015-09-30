<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

class ButtonDropDown extends DropDown
{
	public $classBase = 'btn-group';
	
	public function __construct(Button $button, Element\UnorderedList $unorderedList, Button $splitButton = null, $context = 'default', Bootstrap3\Size $size, $dropup = false)
	{		
		$dropDownButton = $button;
		
		if(isset($splitButton))
		{
			$dropDownButton = $splitButton;
		}
		
		parent::__construct($dropDownButton, $unorderedList);
		
		if(isset($splitButton))
		{
			parent::add($button, true);
		}
	}
}
