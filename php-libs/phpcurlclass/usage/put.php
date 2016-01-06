<?php
$ds = DIRECTORY_SEPARATOR;
require "..{$ds}vendor{$ds}autoload.php";
use \Curl\Curl;

define('BASE_URL', 'http://jsonplaceholder.typicode.com/posts');
$data = [
    'title' => 'levent update',
    'body' => 'lorem ipsum update ',
    'userId' => 'batman update',
    'id' => 101
];

$curl = new Curl();
$result = $curl->put(BASE_URL, $data);
var_export($result);