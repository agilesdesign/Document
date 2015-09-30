<?php

namespace Fuse\Document;

use \Fuse\Document\Element as Element;

class Element
{
	protected $tag;
	
	protected $singleton = false;
	
	protected $classBase;
	
	protected $id;
	
	protected $attributes = array();
	
	public $contents = array();
	
	public $jquery = array();
	
	public function __construct()
	{
		if(isset($this->classBase))
		{
			$this->addClass($this->classBase);
		}
	}
	
	public function render()
	{	
		$html = '';
		$attributes = $this->attributes;
		
		if(empty($attributes))
		{
			$attributes = '';
		}
		else
		{
			if(!empty($attributes['class']))
			{
				$attributes['class'] = implode(' ', $attributes['class']);
			}

			if(!empty($attributes['style']))
			{
				$attributes['style'] = implode(' ', $attributes['style']);	
			}
			
			foreach($attributes as $key => $attribute)
			{
				if(empty($attribute))
				{
					unset($attributes[$key]);
				}
			}
			
			$attributes = ' ' . self::attributesToString($attributes);
		}
		
		$html .= '<' . $this->tag . $attributes .  '>';
		
		if(!$this->singleton)
		{
			// potential wrap in if determining if this object is a singleton
			// if so don't render this->content;
			foreach($this->contents as $content)
			{
				if(is_string($content))
				{
					$html .= $content;
				}
				else
				{
					$html .= $content->render();
				}
			}
		
			$html .= '</' . $this->tag . '>';
		}
		
		$format = new Format;
		$html = $format->HTML($html);
		
		return $html;
	}
	
	public function addStyle($property, $value)
	{
		if(!isset($this->attributes['style']))
		{
			$this->attributes['style'] = array();
		}
		
		$style = $property . ': ' . $value;
		
		if(!(in_array($style, $this->attributes['style'])))
		{
			$this->attributes['style'][] = $style;
		}
		
		return $this;
	}
	
	public function addClass($class)
	{
		if(isset($class) && $class != '')
		{
			if(!isset($this->attributes['class']))
			{
				$this->attributes['class'] = array();
			}

			if(!(in_array($class, $this->attributes['class'])))
			{
				$this->attributes['class'][] = $class;
			}
		}
		
		
		return $this;
	}
	
	public function removeClass($class)
	{
		if(($key = array_search($class, $this->attributes['class'])) !== false)
		{
			unset($this->attributes['class'][$key]);
		}
		
		return $this;
	}
	
	public function add($contents, $prepend = false)
	{
		if(!$prepend)
		{
			$this->contents[] = $contents;
		}
		else
		{
			array_unshift($this->contents, $contents);
		}
		
		return $this;
	}
	
	public function wrap(Element $element)
	{
		$element->add($this);
		
		return $element;
	}
	
	public function wrapContent(Element $element)
	{	
		$element->add($this->contents);
		
		$this->contents = array($element);
		
		return $this;
	}
	
	public function getAttribute($name)
	{
		return $this->attributes[$name];
	}
	
	public function setAttribute($name, $value)
	{
		if($name == 'class' || $name == 'style')
		{
			array_merge($this->attributes[$name], explode(' ', $value));
		}
		else
		{
			$this->attributes[$name] = $value;
		}
	
		return $this;
	}
	
	private function attributesToString(array $array, $inner_glue = '=', $outer_glue = ' ', $keepOuterKey = false)
	{
		$output = array();

		foreach ($array as $key => $item)
		{
			if (is_array($item))
			{
				if ($keepOuterKey)
				{
					$output[] = $key;
				}

				// This is value is an array, go and do it again!
				$output[] = $this->attributesToString($item, $inner_glue, $outer_glue, $keepOuterKey);
			}
			else
			{
				$output[] = $key . $inner_glue . '"' . $item . '"';
			}
		}

		return implode($outer_glue, $output);
	}
	
	public function removeChildByAttribute($elementType, $name, $value, $recurse = false)
	{
		$classPath = '\Fuse\Document\Element\\' . $elementType;
		
		foreach($this->contents as $key => $content)
		{
			if(is_a($content, $classPath) && $content->attributes[$name] == $value)
			{
				unset($this->contents[$key]);
			}
			
			if($recurse && is_a($content, '\Fuse\Document\Element'))
			{
				$content->removeChildByAttribute($elementType, $name, $value, $recurse);
			}
		}
	}
	
	public function getAttributes()
	{
		return $this->attributes;	
	}
}