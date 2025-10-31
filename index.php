<?php

require_once __DIR__ . '/vendor/autoload.php';

use WordReverser\WordReverser;

print "Hello World!\n";

$result = WordReverser::reverseWords('Привет! ка\'к Дела?');
echo $result . "\n";