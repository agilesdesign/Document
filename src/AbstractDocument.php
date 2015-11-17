<?php

namespace Document;

class AbstractDocument
{
	public $contents = array();
	
	public function add($contents, $prepend = false)
	{
		if(!$prepend)
		{
			$this->contents[] = $contents;
		}
		else
		{
			array_unshift($this->contents, $contents);
		}
		
		return $this;
	}
}
?>