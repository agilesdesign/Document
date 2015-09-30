<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Fieldset extends Element
{
	const tag = 'fieldset';
	
	protected $tag = self::tag;
	
	public function __construct($disabled = false)
	{
		parent::__contruct();
		
		if($disabled)
		{
			parent::setAttribute('disabled', '');
		}
	}
}