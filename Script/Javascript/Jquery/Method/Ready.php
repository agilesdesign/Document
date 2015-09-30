<?php

namespace Fuse\Document\Script\Javascript\Jquery\Method;

use \Fuse\Document\Script\Javascript\Jquery as Jquery;

class Ready extends Jquery\Method
{
	protected $name = 'ready';
	
	protected $type = 'string';
	
	protected function renderOptions()
	{
		return 'function(){ ' . parent::renderOptions() . '}';
	}
}

?>