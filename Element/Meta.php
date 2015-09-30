<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Meta extends Element
{
	const tag = 'meta';
	
	protected $tag = self::tag;
	
	protected $singleton = true;
	
	public function addMetaContent($value, $glue = ', ')
	{
		if(isset($this->getAttributes()['content']))
		{
			$this->getAttributes()['content'] .= $glue . $value;

			return $this;
		}
		
		$this->setAttribute('content', $value);
		
		return $this;
	}
}