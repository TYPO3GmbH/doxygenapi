#!/usr/bin/php
<?php
/**
 * Project: doxygen-php-filters
 * User:    Alex Schickedanz (AbcAeffchen)
 * Date:    05.03.2015
 * License: GPL v2.0
 */

// Input
$source = file_get_contents($argv[1]);

// support short array syntax
$regexp = '#((var|public|protected|private)(\s+static)?)\s+(\$[^\s;=]+)\s+\=\s+\[([\s\S]*?)\]\;#';
$replace = '$1 $4 = array( $5 );';
$source = preg_replace($regexp, $replace, $source);

// add class member type hints
$regexp = '#\@(var|type)\s+([^\s]+)([^/]+)/\s+(var|public|protected|private)(\s+static)?\s+(\$[^\s;=]+)#';
$replace = '$3 */ $4 $5 $2 $6';
$source = preg_replace($regexp, $replace, $source);

// add type hinting to methods
$regexp = '#(\/\*\*[\s\S]*?@return\s+([^\s]*)[\s\S]*?\*\/[\s\S]*?)((public|protected|private)(\s+static)?)\s+function\s+([\S]*?)\s*?\(#';
$replace = '$1 $3 $2 function $6(';
$source = preg_replace($regexp, $replace, $source);

// make traits to classes
$regexp = '#trait([\s]+[\S]+[\s]*){#';
$replace = 'class$1{';
$source = preg_replace($regexp, $replace, $source);

// use traits by extending them (classes that not extending a class)
$regexp = '#class([\s]+[\S]+[\s]*){[\s]+use([^;]+);#';
$replace = 'class$1 extends $2 {';
$source = preg_replace($regexp, $replace, $source);

// use traits by extending them (classes that already extending a class)
$regexp = '#class([\s]+[\S]+[\s]+extends[\s]+[\S]+[\s]*){[\s]+use([^;]+);#';
$replace = 'class$1, $2 {';
$source = preg_replace($regexp, $replace, $source);

// following part TYPO3 specific

// kill single line comments starting with phpdoc annotation
$regexp = '#/\*\*.*? \*/#';
$replace = '';
$source = preg_replace($regexp, $replace, $source);

// Output
echo $source;
