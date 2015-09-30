# Introduction
PHP Class providing an object-oriented interface to build/render Documents and their Elements.
# Documentation

## HTML Element
### Basic Example
#### Code
```php

use \Fuse\Document\Element as Element;

$div = new Element\Div();

$div->addClass('banana')
	->setAttribute('id', 'fuse-banana');
	->add('Banana Div');

echo $div->render();

```
#### Output
```html
<div id="fuse-banana" class="banana">
	Banana Div
</div>
```

### Advanced Example
#### Code
```php

use \Fuse\Document\Element as Element;

$ul = new Element\UnorderedList();
$ul->setAttribute('id', 'banana-ul');

// mockup menu data
// likely coming from a data source
$items = array(
	array('text' => 'One', 'link' => '#one'),
	array('text' => 'Two', 'link' => '#two'),
	array('text' => 'Three', 'link' => '#three'),
);

foreach($items as $i)
{
	// create new <li>
	$item = new Element\ListItem();
	$item->setAttribute('id', strtolower($i['text']));
	
	// create new <a>
	// requires value for href attribute
	// should hold item's text
	$anchor = new Element\Anchor($i['link']);
	$anchor->add($i['text']);
	
	// add <a> to <li>
	$item->add($anchor);
	
	//add <li> to <ul>
	$ul->add($item);
}

// <div> to place <ul> in
$div = new Element\Div();
$div->setAttribute('id', 'ul-wrapper');

// surround <ul> with <div id="ul-wrapper">
// returns object passed into wrap ($div)
	// contents of returned object ($div) now set to $ul object
$div = $ul->wrap($div);

// prepend to the content of $div
// formatter will automatically wrap this text in a <p>
$div->add('Before unordered list', true);

// append to the content of $div
// formatter will automatically wrap this text in a <p>
$div->add('After unordered list', true);

// give class "ul-item" to every <li>
$div = Element\Helper::fixChildrenClass($div, 'ListItem', 'ul-item');

echo $div->render();
```

#### Output
```html
<div id="ul-wrapper">
	Before unordered list
	<ul id="banana-ul">
		<li id="one">
			<a href="#one">One</a>
		</li>
		<li id="two">
			<a href="#two">Two</a>
		</li>
		<li id="three">
			<a href="#three">Three</a>
		</li>
	</ul>
	After unordered list
</div>
```

### Extended Example (Bootstrap 3)
#### Code
```php

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

// col-xs => 12, col-sm => 12, col-md => 8
$breakpoints = new Bootstrap3\Breakpoints(12, 12, 8, null);
// col-offset-md => 2
$offsets = new Bootstrap3\Breakpoints(null, null, 2, null);

// instantiate Bootstrap 3 Column
$column = new Bootstrap3\Component\Column($breakpoints, $offsets);

// create <h3>
$h3 = new Element\Header(3);
$h3->add('H3 Title');

// create <p>
$p = new Element\Paragraph();
$p->add('Banana ipsum dolar mit.');


$column->add($h3) 	// add <h3> to Bootstrap 3 Column
	->add($p); 		// add <p> to Bootstrap 3 Column

$container = $column->wrap(new Bootstrap3\Component\Row())				// wrap Boostrap 3 Column in Bootstrap Row
					->wrap(new Bootstrap3\Component\Container(true));	// wrap Bootstrap 3 Row in Bootstrap 3 Container Fluid

echo $container->render();
```

#### Output
```html
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
			<h3>
				H3 Title
			</h3>
			<p>
				Banana ipsum dolar mit.
			</p>
		</div>
	</div>
</div>
```

### Examples of Extending Elements
#### Bootstrap 3 Alert
```php
<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;

class Alert extends Element\Div
{	
	protected $classBase = 'alert';
	
	public function __construct($context, Button $button = null)
	{	
		parent::__construct();
		
		parent::addClass($this->classBase . '-' . $context);
		
		parent::setAttribute('role', 'alert');
		
		if(isset($button))
		{
			$button->addClass('close')
				->setAttribute('data-dismiss', 'alert');
			
			parent::addClass($this->classBase . '-dismissible');
			
			parent::add($button);
		}
	}
	
	public function add($contents, $prepend = false)
	{
		$contents = Element\Helper::fixChildrenClass($contents, 'Anchor', 'alert-link');
		
		parent::add($contents, $prepend = false);
		
		return $this;
	}
}
```

#### Bootstrap 3 Button
There are instances when the object you are creating could be render with an array of element tags.
Bootstrap 3 Buttons for example could be: <a> or <button>.

In this case extend Element directly, accept the tag as a parameter, and set the objects->tag property equal to that.
$object->render() will handle the rest for you.

```php
<?php

namespace Fuse\Document\Element\Bootstrap\Bootstrap3\Component;

use \Fuse\Document\Element as Element;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

class Button extends Element
{	
	protected $classBase = 'btn';
	
	public function __construct($tag = 'button', $context = null, Bootstrap3\Size $size, $active = false, $disabled = false, $block = false)
	{
		if($tag == 'input')
		{
			$tag = 'button';
		}
		
		$this->tag = $tag;
		
		parent::__construct();
		
		if($this->tag == 'button')
		{
			parent::setAttribute('type', 'button');
		}
		
		if(isset($context))
		{
			parent::addClass($this->classBase . '-' . $context);
		}
		
		if(isset($size))
		{
			parent::addClass($this->classBase . '-' . $size);
		}
		
		if($active)
		{
			parent::addClass('active');
		}
		
		if($disabled)
		{
			switch($this->tag)
			{
				case 'button':
					parent::setAttribute('disabled', 'disabled');
					break;
				case 'a';
					parent::addClass('disabled');
					break;
			}
		}
		
		if($block)
		{
			parent::addClass($this->classBase . '-block');
		}
	}
}
```
