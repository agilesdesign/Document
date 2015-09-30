<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3;

use \Fuse\Document\Element as Element;

class DescriptionList extends Element\DescriptionList
{	
	public function __construct(Element\DescriptionTerm $term, Element\DescritionDefinition $definition, $horizontal = false)
	{	
		parent::__construct($term, $definition);
		
		if($horizontal)
		{
			parent::addClass($this->tag . '-horizontal');
		}
	}
}