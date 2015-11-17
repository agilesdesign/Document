# Introduction
PHP Class providing an object-oriented interface to build/render Documents.
# Documentation

## HTML Document
Work in progress
### Code
```php
<?php

$document = new \Document\Html('en', 'utf-8', 'Banana', null, 'width=device-width, initial-scale=1');
$document
    ->addStyleSheet(new \Element\Link('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css', 'stylesheet'))
    ->addScript(new \Element\Script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'))
    ->toBody((new \Element\Header(1))->add('H1'))
    ->toBody((new \Element\Header(2))->add('H2'))
    ->toBody((new \Element\Header(3))->add('H3'))
    ->toBody((new \Element\Header(4))->add('H4'))
    ->toBody((new \Element\Header(5))->add('H5'))
    ->toBody((new \Element\Header(6))->add('H6'))
    ->toBody((new \Element\Paragraph)->add('Paragraph'))
    ->toBody((new \Element\Div)->add('in a div'));
?>
```

### HTML Representation
```html

<!DOCTYPE html>
<html lang="en" xml:lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="values" content="width=device-width, initial-scale=1">
		<title>Banana</title>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h1>
			H1
		</h1>
		<h2>
			H2
		</h2>
		<h3>
			H3
		</h3>
		<h4>
			H4
		</h4>
		<h5>
			H5
		</h5>
		<h6>
			H6
		</h6>
		<p>
			Paragraph
		</p>
		<div>
			in a div
		</div>
	</body>
</html>
```
