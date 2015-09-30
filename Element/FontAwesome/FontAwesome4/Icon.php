<?php
namespace Fuse\Document\Element\FontAwesome\FontAwesome4;

use \JHtml as JHtml;
use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\FontAwesome\FontAwesome4 as FontAwesome4;

defined('JPATH_PLATFORM') or die;

class Icon extends Element\Span
{
	public $classBase = 'fa';
	
	public function __construct($icon, $size = null, $fixedWidth = false, $pull = null, $rotate = null, $flip = null, $bordered = false)
	{	
		parent::__construct();

		parent::addClass($this->classBase . '-' . $icon);
		
		if(isset($size))
		{
			parent::addClass($this->classBase . '-' . $size);
		}
		
		if($fixedWidth)
		{
			parent::addClass($this->classBase . '-fw');
		}
		
		if(isset($pull))
		{
			parent::addClass($this->classBase . '-pull-' . $pull);
		}
		
		if($bordered)
		{
			parent::addClass($this->classBase . '-border');
		}
		
		if(isset($rotate))
		{
			parent::addClass($this->classBase . '-rotate-' . $rotate);
		}
		
		if(isset($flip))
		{
			parent::addClass($this->classBase . '-flip-' - $flip);
		}
	}
}
