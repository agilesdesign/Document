<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class DescriptionList extends Element
{
	const tag = 'dl';
	
	protected $tag = self::tag;
	
	public function __consturct(Element\DescriptionTerm $term = null, Element\DescriptionDefinition $definition = null)
	{
		parent::__construct();
		
		parent::add($term);
		parent::add($definition);
	}
}