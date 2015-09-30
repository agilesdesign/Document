<?php

namespace Fuse\Document\Script\Javascript;

class Method
{
	protected $name;

	public $options = array();
	
	protected $type = 'string';
	
	protected $delimiter = '';
	
	protected $wrap = false;
	
	public function add($value, $name = null)
	{
		
		if($this->type === 'json' && isset($name))
		{
			$this->options[$name] = $value;
		}
		elseif($this->type === 'string')
		{
			$value = $this->wrap ? '"' . $value . '"' : $value;
			
			$this->options[] = $value;
		}
		
		return $this;
	}
	
	public function render()
	{
		return '.' . $this->name . '(' . $this->renderOptions() . ')';
	}
	
	protected function renderOptions()
	{
		if($this->type === 'json')
		{	
			return json_encode($this->options);
		}
		
		if($this->type === 'string')
		{
			return implode($this->delimiter, $this->options);
		}
	}
}
?>