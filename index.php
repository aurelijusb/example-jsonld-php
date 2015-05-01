<?php

require 'vendor/autoload.php';

use \ML\JsonLD\JsonLD;
use \ML\JsonLD\NQuads;

$file = 'test.json';
$data = file_get_contents($file);
$context = trim(file_get_contents('context.jsonld'), '{}');
$inlineContext = str_replace('"@context": "http://auginte.com/ns/s.jsonld"', $context, $data);

echo '<pre>' . htmlspecialchars($data) . '</pre><hr/>';
echo '<pre>' . htmlspecialchars($inlineContext) . '</pre><hr/>';

$expanded = JsonLD::expand($inlineContext);
$expandedJson = JsonLD::toString($expanded, true);
echo '<pre>' . htmlspecialchars($expandedJson) . '</pre><hr/>';


$quads = JsonLD::toRdf($inlineContext);
$nquads = new NQuads();
$serialized = $nquads->serialize($quads);
print '<pre>' . htmlspecialchars($serialized) . '</pre><hr/>';
