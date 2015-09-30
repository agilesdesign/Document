<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class TableHead extends Element
{
	const tag = 'thead';
	
	protected $tag = self::tag;
	
	public function __construct(Element\TableRow $row = null)
	{
		if(isset($row))
		{
			parent::add($row);
		}
	}
	
	public function addRow(Element\TableRow $row, $prepend = false)
	{
		parent::add($row, $prepend);
		
		return $this;
	}
}