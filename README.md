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
There are instances when the object you are creating could be rendered as one of many element tags.
Bootstrap 3 Buttons for example could be: `<a>` or `<button>`.

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
## HTML Document
Work in progress
### Code
```php
<?php

use \Fuse\Document\Element as Element;
use \Fuse\Document\Html as DocumentHtml;
use \Fuse\Document\Element\Bootstrap\Bootstrap3 as Bootstrap3;

// new Html Document
$document = new DocumentHtml(null, null, null, 'utf-8', 'Document Title', null, 'width=device-width, initial-scale=1');

// register javascript and css files
$document
	->addStyleSheet(new Element\Link('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css', 'stylesheet'))
	->addStyleSheet(new Element\Link('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css', 'stylesheet'))
	->addScript(new Element\Script(null, 'https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.js'))
	->addScript(new Element\Script(null, 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js'));

// new bootstrap 3 jumbotron
$jumbotron = new Bootstrap3\Component\Jumbotron();

// center text
$jumbotron->addClass('text-center');

// new <h1>
$h1 = new Element\Header(1);
$h1->add('Jumbotron');
$jumbotron->add($h1);

// new <h2>
$h2 = new Element\Header(2);
$h2->add('Subtitle or slogan');
$jumbotron->add($h2);

// new <p>
$p = new Bootstrap3\Paragraph();
$p->add('Banana ipsum dolar mit dem.');
$jumbotron->add($p);

// new bootstrap 3 button
$btnOne = new Bootstrap3\Component\Button('button', 'default', new Bootstrap3\Size('md'));
$btnOne->add('!Banana');
$jumbotron->add($btnOne);

// new bootstrap 3 button
$btnTwo = new Bootstrap3\Component\Button('button', 'warning', new Bootstrap3\Size('md'));
$btnTwo->add('Banana');
$jumbotron->add($btnTwo, true);

// bootstrap 3 column breakpoints and offsets (xs, sm, md, lg);
$breakpoints = new Bootstrap3\Breakpoints(12, 12, 8, null);
$offsets = new Bootstrap3\Breakpoints(null, null, 2, null);

// wrap bootstrap 3 jumbotron in a bootstrap 3 column
	// wrap bootstrap 3 column in bootstrap 3 row
	// wrap bootstrap 3 row in bootstrap 3 container
$container = $jumbotron->wrap(new Bootstrap3\Component\Column($breakpoints, $offsets))
		->wrap(new Bootstrap3\Component\Row())
		->wrap(new Bootstrap3\Component\Container());

// add entire jumbotron container to the document
$document->addToBody($container);

// render HTML document
echo $document->render();
?>
```

### Output
```html
<!DOCTYPE html>
<html >
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Document Title</title>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap-theme.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
					<div class="jumbotron text-center">
						<h1>
							Jumbotron
						</h1>
						<h2>
							Subtitle or slogan
						</h2>
						<p>
							Banana ipsum dolar mit dem.
						</p>
						<button class="btn btn-default btn-md" type="button">
							!Banana
						</button>
						<button class="btn btn-warning btn-md" type="button">
							Banana
						</button>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
```
