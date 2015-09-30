<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Media extends Element
{	
	protected $classBase = 'media';
	
	public function __construct($tag = 'div')
	{
		$this->tag = $tag;
		
		parent::__construct();
	}
	
	public function addItem(Element\Div $contents, $type = 'body', $alignment = null, $prepend = false)
	{
		$contents->addClass($this->classBase . '-' . $type);
		
		if(isset($alignment))
		{
			$contents->addClass($this->classBase . '-' . $alignment);
		}
		
		parent::add($contents, $prepend);
		
		return $this;
	}
}