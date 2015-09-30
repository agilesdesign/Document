<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

class Button extends Element
{	
	protected $classBase = 'btn';
	
	public function __construct($tag = 'button', $context = null, Bootstrap3\Size $size, $active = false, $disabled = false, $block = false)
	{
		if($tag == 'input')
		{
			$tag = 'button';
		}
		
		$this->tag = $tag;
		
		parent::__construct();
		
		if($this->tag == 'button')
		{
			parent::setAttribute('type', 'button');
		}
		
		if(isset($context))
		{
			parent::addClass($this->classBase . '-' . $context);
		}
		
		if(isset($size))
		{
			parent::addClass($this->classBase . '-' . $size);
		}
		
		if($active)
		{
			parent::addClass('active');
		}
		
		if($disabled)
		{
			switch($this->tag)
			{
				case 'button':
					parent::setAttribute('disabled', 'disabled');
					break;
				case 'a';
					parent::addClass('disabled');
					break;
			}
		}
		
		if($block)
		{
			parent::addClass($this->classBase . '-block');
		}
	}
}