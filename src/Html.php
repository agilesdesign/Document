<?php

namespace Document;

use \Element as Element;

class Html extends AbstractDocument
{	
	protected $head;
	
	protected $body;
	
	protected $html;
	
	protected $scriptDeclarations = array();
	
	protected $styleDeclarations = array();
	
	public function __construct($language = null, $charset = null, $title = null, $description = null, $viewport = null, $httpEquiv = null, $direction = null)
	{
		$this->html = new Element\Html();
		
		if(isset($language))
		{
			$this->html
				->setAttribute((new \Element\Attribute('lang'))->append($language))
				->setAttribute((new \Element\Attribute('xml:lang'))->append($language));
		}
		
		$this->head = new Element\Head();
		$this->body = new Element\Body();
		
		if(isset($charset))
		{
			$this->head->add(
				(new Element\Meta())
					->setAttribute((new \Element\Attribute('charset'))->append($charset))
			);
		}
		
		if(isset($httpEquiv))
		{
			$this->head->add(
				(new Element\Meta())
					->setAttribute((new \Element\Attribute('http-equiv'))->append('values', $httpEquiv))
					->setAttribute((new \Element\Attribute('content'))->append('IE-edge'))
			);
		}
		
		if(isset($viewport))
		{
			$this->head->add(
				(new Element\Meta())
					->setAttribute((new \Element\Attribute('name'))->append('values', 'viewport'))
					->setAttribute((new \Element\Attribute('content'))->append($viewport))
			);
		}
		
		if(isset($title))
		{	
			$this->head->add(
				(new Element\Title())
					->add($title)
			);
		}
		
		if(isset($description))
		{
			$this->head->add(
				(new Element\Meta())
					->setAttribute('name', 'description')
					->setAttribute('content', $description)
			);
		}
	}
	
	public function toBody($content, $prepend = false)
	{
		$this->body->add($content, $prepend);
		
		return $this;
	}
	
	public function addScript(Element\Script $script, $inHead = true)
	{
		if($inHead)
		{
			$this->head->add($script);
		}
		else
		{
			$this->body->add($script);
		}
		
		return $this;
	}
	
	public function removeScript($src)
	{
		$this->head->removeChildByAttribute('Script', 'src', $src);
		
		$this->body->removeChildByAttribute('Script', 'src', $src, true);
		
		return $this;
	}
	
	public function addStyleSheet(Element\Link $styleSheet, $defer = false)
	{
		if($defer)
		{
			$this->body->add($styleSheet);
		}
		else
		{
			$this->head->add($styleSheet);
		}
		
		return $this;
	}
	
	public function removeStyleSheet($href)
	{
		$this->head->removeChildByAttribute('Link', 'href', $href);
		
		$this->body->removeChildByAttribute('Link', 'href', $href, true);
		
		return $this;
	}
	
	// I actively have no clue what this is doing
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
	
	public function build()
	{
		$this->html
			->add($this->head)
			->add($this->body);
		
		$this->add($this->html);
		
		return $this;
	}
}