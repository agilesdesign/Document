# Introduction
PHP Class providing an object-oriented interface to build/render Documents and their Elements.
# Documentation

## HTML
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
