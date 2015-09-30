<?php

namespace Fuse\Document\Script\Javascript;

use \Fuse\Document\Script\Javascript\Method as Method;

class Skrollr
{
	protected $methods;

	protected $assignmentVariable;

	public function __construct($assignmentVariable = null)
	{

		if(isset($assignmentVariable))
		{
			$this->assignmentVariable = $assignmentVariable;
		}
	}

	public function add(Method $method)
	{
		$this->methods[] = $method;

		return $this;
	}

	public function render()
	{
		$result = isset($this->assignmentVariable) ? 'var ' . $this->assignmentVariable . ' = ' : '';

		$result .= 'skrollr';
		
		if(!empty($this->methods))
		{
			foreach($this->methods as $method)
			{
				$result .= $method->render();
			}	
		}
		
		$result .= ';';

		return $result;
	}
}

?>