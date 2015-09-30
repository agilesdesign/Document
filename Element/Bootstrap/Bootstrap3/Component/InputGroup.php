<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

class InputGroup extends Element\Div
{	
	protected $classBase = 'input-group';
	
	public function __construct(Element\Span $leftAddon = null, Bootstrap3\Input $input, Element\Span $rightAddon = null)
	{
		parent::__construct();
		
		if(isset($leftAddon))
		{
			$leftAddon->addClass('input-group-addon');
			parent::add($leftAddon);
		}
		
		parent::add($input);
		
		if(isset($rightAddon))
		{
			$rightAddon->addClass('input-group-addon');
			parent::add($rightAddon);
		}
	}
}