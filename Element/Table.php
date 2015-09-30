<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Table extends Element
{
	const tag = 'table';
	
	protected $tag = self::tag;
	
	protected $head = false;
	
	public function __construct(Element\TableHead $head = null)
	{
		parent::__construct();
		
		if(isset($head))
		{
			$this->head = true;
			
			parent::add($head);
		}
		
		$body = new Element\TableBody();
		
		parent::add($body);
	}
	
	public function addRow(Element\TableRow $row, $prepend = false)
	{
		if($this->head)
		{
			$this->contents[1]->addRow($row, $prepend);
			
			return $this;
		}
		
		$this->contents[0]->addRow($row, $prepend);
		
		return $this;
	}
}