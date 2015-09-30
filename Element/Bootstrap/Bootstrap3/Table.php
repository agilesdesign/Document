<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class Table extends Element\Table
{
	protected $classBase = 'table';
	
	public function __construct(Element\TableHead $head = null, $striped = false, $bordered = false, $hover = false, $condensed = false)
	{	
		parent::__construct($head);
		
		if($striped)
		{
			parent::addClass($this->classBase . '-striped');
		}
		
		if($bordered)
		{
			parent::addClass($this->classBase . '-bordered');
		}
		
		if($hover && !$striped)
		{
			parent::addClass($this->classBase . '-hover');
		}
		
		if($condensed)
		{
			parent::addClass($this->classBase . '-condensed');
		}
	}
}