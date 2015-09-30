<?php
namespace Fuse\Document\Element\FontAwesome\FontAwesome4;

use \JHtml as JHtml;
use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\FontAwesome\FontAwesome4 as FontAwesome4;

defined('JPATH_PLATFORM') or die;

class StackedIcon extends Element\Span
{
	public $classBase = 'fa-stack';
	
	public function __construct($size = FontAwesome4\Size::Normal, FontAwesome4\Icon $top, FontAwesome\Icon $bottom)
	{
		FontAwesome4::framework();
		
		parent::__construct();
		
		if(isset($size))
		{
			parent::addClass($this->classBase . '-' . $size);
		}
		
		$top->addClass($this->classBase . '-stack-2x');
		$bottom->addClass($this->classBase . '-stack-1x');
		
		parent::add($top);
		parent::add($bottom);
	}
}
