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
```
