<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Tabs extends Element\Div
{	
	protected $classBase = 'tab-content';
	
	protected $childClassBase = 'tab-pane';
	
	public function addPane($id, Element\Div $pane, $animate = null, $prepend = false)
	{
		$pane->setAttribute('id', $id)
			->addClass($this->childClassBase);
		
		if(isset($animate))
		{
			$pane->addClass($animate);
		}
		
		if(empty($this->contents))
		{
			$pane->addClass('active');
			
			if(isset($animate))
			{
				$pane->addClass('in');
			}
		}
		
		parent::add($pane);
		
		return $this;
	}
}