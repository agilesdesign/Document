<?php

namespace Fuse\Document;

use \Fuse\Document as Document;
use \Fuse\Document\Element as Element;

class Html extends Document
{	
	public $head;
	
	public $body;
	
	public $scriptDeclarations = array();
	
	public $styleDeclarations = array();
	
	public function __construct(Element\Head $head = null, Element\Body $body = null, $language = null, $charset = null, $title = null, $description = null, $viewport = null, $httpEquiv = null, $direction = null)
	{
		$html = new Element\Html();
		$html->setAttribute('lang', $language)
			->setAttribute('xml:lang', $language);
		
		if(!isset($head))
		{
			$head = new Element\Head();
		}
		
		if(!isset($body))
		{
			$body = new Element\Body();
		}
		
		if(isset($charset))
		{
			$charsetMeta = new Element\Meta();
			$charsetMeta->setAttribute('charset', $charset);
			
			$head->add($charsetMeta);
		}
		
		if(isset($httpEquiv))
		{
			$httpEquivMeta = new Element\Meta();
			$httpEquivMeta->setAttribute('http-equiv', 'X-UA-COMPATIBLE')
				->setAttribute('content', 'IE-edge');

			$head->add($httpEquivMeta);
		}
		
		if(isset($viewport))
		{
			$viewportMeta = new Element\Meta();
			$viewportMeta->setAttribute('name', 'viewport')
				->setAttribute('content', $viewport);

			$head->add($viewportMeta);	
		}
		
		if(isset($title))
		{
			$titleElement = new Element\Title();
			$titleElement->add($title);
			
			$head->add($titleElement);
		}
		
		if(isset($description))
		{
			$descriptionMeta = new Element\Meta();
			$descriptionMeta->setAttribute('name', 'description')
				->setAttribute('content', $description);
			
			$head->add($descriptionMeta);
		}
		
		$html->add($head)
			->add($body);
		
		$this->add($html);

	}
	
	public function addToHead($content, $prepend = false)
	{
		$this->contents[0]->contents[0]->add($content, $prepend);
		
		return $this;
	}
	
	public function addToBody($content, $prepend = false)
	{
		$this->contents[0]->contents[1]->add($content, $prepend);
		
		return $this;
	}
	
	public function render()
	{	
		$results = parent::render();
		
		return '<!DOCTYPE html>' . $results;
		//$this->foot->render();
	}
	
	public function addScript(Element\Script $script, $inHead = true)
	{
		if($inHead)
		{
			$this->contents[0]->contents[0]->add($script);
		}
		else
		{
			$this->contents[0]->contents[1]->add($script);
		}
		
		return $this;
	}
	
	public function removeScript($src)
	{
		$this->contents[0]->contents[0]->removeChildByAttribute('Script', 'src', $src);
		
		$this->contents[0]->contents[1]->removeChildByAttribute('Script', 'src', $src, true);
		
		return $this;
	}
	
	public function addStyleSheet(Element\Link $styleSheet, $defer = true)
	{
		if($defer)
		{
			$this->contents[0]->contents[0]->add($styleSheet);
		}
		else
		{
			$this->contents[0]->contents[1]->add($styleSheet);
		}
		
		return $this;
	}
	
	public function removeStyleSheet($href)
	{
		$this->contents[0]->contents[0]->removeChildByAttribute('Link', 'href', $href);
		
		$this->contents[0]->contents[1]->removeChildByAttribute('Link', 'href', $href, true);
		
		return $this;
	}
	
	public function addMetaContent($name, $value, $glue = ', ')
	{
		foreach($this->contents[0]->contents[0] as $content)
		{
			if(is_a($content, '\Fuse\Document\Element') && $content->getAttributes()['name'] == $name)
			{
				$content->getAttributes()['content'] .= $glue . $keyword;
				
				return $this;
			}
		}
		
		$meta = new Element\Meta();
		$meta->setAttribute('name', $name)
			->setAttribute('content', $value);
		
		$this->contents[0]->contents[0]->add($meta);
		
		return $this;
	}
}