<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class TableBody extends Element
{
	const tag = 'tbody';
	
	protected $tag = self::tag;
	
	public function addRow(Element\TableRow $row, $prepend = false)
	{
		parent::add($row, $prepend);
		
		return $this;
	}
}