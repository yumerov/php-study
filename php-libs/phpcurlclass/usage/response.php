<?php
$ds = DIRECTORY_SEPARATOR;
require "..{$ds}vendor{$ds}autoload.php";
use \Curl\Curl;

define('BASE_URL', 'http://jsonplaceholder.typicode.com/posts');

$curl = new Curl();
$curl->get(BASE_URL);

if ($curl->error) {
    echo 'Error code: ' . $curl->error_code . "\n"; // 404
    echo 'Error message: ' . $curl->error_message . "\n"; // HTTP/1.1 404 Not Found
}
else {
    echo $curl->response;
}