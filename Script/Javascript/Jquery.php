<?php

namespace Fuse\Document\Script\Javascript;

use \Fuse\Document\Script\Javascript as Javascript;

class Jquery
{

	protected $selector;

	protected $noConflict;

	protected $methods;

	protected $assignmentVariable;

	public function __construct($selector, $noConflict = false, $assignmentVariable = null)
	{
		$this->selector = $selector;

		if(isset($assignmentVariable))
		{
			$this->assignmentVariable = $assignmentVariable;
		}

		$this->noConflict = $noConflict;
	}

	public function add(Javascript\Jquery\Method $method)
	{
		$this->methods[] = $method;

		return $this;
	}

	public function render()
	{
		$result = isset($this->assignmentVariable) ? 'var ' . $this->assignmentVariable . ' = ' : '';

		$result .= $this->noConflict ? 'jQuery' : '$' ;

		$result .= '("' . $this->selector . '")';
		
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