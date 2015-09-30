<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

abstract class Helper
{
	
	static function fixChildrenClass($content, $elementType, $class, $fixRawHtml = true)
	{	
		$classPath = '\Fuse\Document\Element\\' . $elementType;
		
		// is this an object that extends element?
		if(is_a($content, '\Fuse\Document\Element'))
		{
			// is this of the right element type?
			if(is_a($content, $classPath))
			{
				$content->addClass($class);
			}
			
			if(isset($content->contents))
			{
				foreach($content->contents as $index => $value)
				{
					$content->contents[$index] = Element\Helper::fixChildrenClass($value, $elementType, $class);
				}
			}
			
			return $content;
		}
		
		if(is_string($content) && $fixRawHtml)
		{
			$dom = new \DOMDocument;

			$dom->loadHtml($content);

			$reflectionClass = new \ReflectionClass($classPath);

			$elements = $dom->getElementsByTagName($reflectionClass->getConstant('tag'));

			foreach($elements as $element)
			{
				$element->setAttribute('class', $element->getAttribute('class') . ' ' . $class);
			}
			
			$dom->removeChild($dom->doctype);
			
			$dom->replaceChild($dom->firstChild->firstChild, $dom->firstChild);
			
			return $dom->saveHTML();
		}
	}
	
	static function fixChildrenAttribute($elementType, $name, $value)
	{
		var_dump('Element\Helper::fixChildrenAttribute needs fixed');
		exit;
		$classPath = '\Fuse\Document\Element\\' . $elementType;
		
		// each element in contents array for this object
		foreach($this->contents as $index => $content)
		{
			// is this an object that extends element?
			if(is_a($content, '\Fuse\Document\Element'))
			{
				// is this of the right element type?
				if(is_a($content, $classPath))
				{
					$content->setAttribute($name, $value);
				}
				
				$content->fixChildrenAttribute($elementType, $name, $value);
			}
			elseif(is_string($content) && $fixRawHtml)
			{
				$dom = new \DOMDocument;
				
				$dom->loadHtml($content);
				
				$reflectionClass = new \ReflectionClass($classPath);
				
				$elements = $dom->getElementsByTagName($reflectionClass->getConstant('tag'));
				
				foreach($elements as $element)
				{
					$element->setAttribute($name, $value);
				}

				$this->contents[$index] = $dom->saveHTML();
			}
		}
	}
	
}

?>