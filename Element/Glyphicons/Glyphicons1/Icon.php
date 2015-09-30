<?php
namespace Fuse\Document\Element\Glyphicons\Glyphicons1;

use \JHtml as JHtml;
use \Fuse\Document\Element\Span as Span;

defined('JPATH_PLATFORM') or die;

class Icon extends Span
{
	public $classBase = 'glyphicon';
	
	public function __construct($icon, $size = null)
	{	
		parent::__construct();
		
		parent::addClass($this->classBase . '-' . $icon);
		
		if(isset($size))
		{
			parent::addClass($this->classBase . '-' . $size);
		}
	}
}
