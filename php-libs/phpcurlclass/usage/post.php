<?php
$ds = DIRECTORY_SEPARATOR;
require "..{$ds}vendor{$ds}autoload.php";
use \Curl\Curl;

define('BASE_URL', 'http://jsonplaceholder.typicode.com/posts');
$data = [
    'title' => 'levent',
    'body' => 'lorem ipsum',
    'userId' => 'batman',
];

$curl = new Curl();
$result = $curl->post(BASE_URL, $data);
var_export($result);