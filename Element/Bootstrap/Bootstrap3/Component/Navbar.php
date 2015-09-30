<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Navbar extends Element
{
	protected $classBase = 'navbar';
	
	protected $tag = 'nav';
	
	protected $fluidContainer;
	
	public function __construct($context = 'default', $static = false, $fixed = null, $fluidContainer = false, Element $brand = null, Button $collapseButton = null, $id = null)
	{	
		$this->fluidContainer = $fluidContainer;
		
		$navBody = new Element\Div();
		
		parent::__construct();
		
		parent::addClass($this->classBase . '-' . $context);
		
		parent::setAttribute('role', 'navigation');
		
		if(isset($id))
		{
			parent::setAttribute('id', $id);
		}
		
		if($static)
		{
			parent::addClass($this->classBase . '-static-top');
		}
		elseif(isset($fixed))
		{
			parent::addClass($this->classBase . '-fixed-' . $fixed);
		}

		if(isset($brand) || isset($collapseButton))
		{
			$navHeader = new Element\Div();
			$navHeader->addClass('navbar-header');
		
			if(isset($brand))
			{
				$brand->addClass('navbar-brand');
				$navHeader->add($brand);
			}

			if(isset($collapseButton))
			{
				$collapseButton->addClass('navbar-toggle')
					->addClass('collapsed')
					->setAttribute('data-toggle', 'collapse')
					->setAttribute('data-target', '#' . $id . ' .navbar-collapse');

				$navHeader->add($collapseButton);

				$navBody->addClass('navbar-collapse')
					->addClass('collapse')
					->setAttribute('id', 'fuse-navbar-collapse');
			}
		}
		
		if($this->fluidContainer)
		{
			$div = new Element\Div();
			$div->addClass('container-fluid');
			
			parent::add($div);
			
			if(isset($navHeader))
			{
				$this->contents[0]->add($navHeader);
			}
			
			$this->contents[0]->add($navBody);
			
			return;
		}

		if(isset($navHeader))
		{
			parent::add($navHeader);
		}
		
		parent::add($navBody);
	}
	
	public function add($contents, $prepend = false)
	{
		$contentsCount = count($this->contents);
		
		if($this->fluidContainer)
		{
			$this->contents[0]
				->contents[$contentsCount - 1]
				->add($contents, $prepend);
			
			return $this;
		}
		
		$this->contents[$contentsCount - 1]
			->add($contents, $prepend);
		
		return $this;
	}
}