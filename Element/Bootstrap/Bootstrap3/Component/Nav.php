<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Nav extends Element\UnorderedList
{	
	protected $classBase = 'nav';
	
	public function __construct($type, $justified = false, $stacked = false)
	{
		parent::__construct();
		
		if($type === 'nav')
		{
			parent::addClass('navbar-' . $type);
		}
		elseif($type === 'tabs' || $type === 'pills')
		{
			parent::addClass($this->classBase . '-' . $type);
		}
		
		if($justified && !$stacked)
		{
			parent::addClass($this->classBase . '-justified');
		}
		
		if($type == 'pills' && $stacked)
		{
			parent::addClass($this->classBase . '-stacked');
		}
	}	
}