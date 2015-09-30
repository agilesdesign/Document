<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class TableResponsive extends Element\Div
{
	protected $classBase = 'table-responsive';
	
	public function __construct(Table $table = null)
	{
		parent::__construct();
		
		if(isset($table))
		{
			parent::add($table);	
		}
	}
}