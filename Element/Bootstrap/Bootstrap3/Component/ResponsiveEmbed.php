<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class ResponsiveEmbed extends Element\Div
{	
	protected $classBase = 'embed-responsive';
	
	protected $classChildBase = 'embed-responsive-item';	
	
	public function __construct(Element $item, $highDef = true)
	{	
		parent::__construct();
		
		parent::addClass($this->classBase . '-' . (($highDef) ? '16by9' : '4by3'));
		
		$item->addClass($this->classChildBase);
		
		parent::add($item);
	}
}