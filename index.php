<?php

require 'vendor/autoload.php';

use \ML\JsonLD\JsonLD;
use \ML\JsonLD\NQuads;

$file = 'test.json';


$expanded = JsonLD::expand($file);
$expandedJson = JsonLD::toString($expanded, true);
echo '<pre>' . htmlspecialchars($expandedJson) . '</pre><hr/>';


$quads = JsonLD::toRdf($file);
$nquads = new NQuads();
$serialized = $nquads->serialize($quads);
print '<pre>' . htmlspecialchars($serialized) . '</pre><hr/>';
