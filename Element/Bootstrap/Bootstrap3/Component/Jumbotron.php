<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Jumbotron extends Element\Div
{
	protected $classBase = 'jumbotron';
	
	protected $container;
	
	public function __construct($container = false)
	{	
		$this->container = $container;
		
		parent::__construct();
		
		if($this->container)
		{
			$div = new Element\Div();
			$div->addClass('container');
			
			parent::add($div);
		}
	}
	
	public function add($contents, $prepend = false)
	{
		if($this->container)
		{
			$this->contents[0]->add($contents, $prepend);
			
			return $this;
		}
		
		parent::add($contents, $prepend);
		
		return $this;
	}
}