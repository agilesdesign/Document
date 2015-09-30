<?php

namespace Fuse\Document\Element;

use \Fuse\Document\Element as Element;

class Deleted extends Element
{
	const tag = 'del';
	
	protected $tag = self::tag;
}