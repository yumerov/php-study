<?php

$ds = DIRECTORY_SEPARATOR;
require "..{$ds}vendor{$ds}autoload.php";
use \Curl\MultiCurl;

$searchEngines = [
//    'https://duckduckgo.com/',
//    'https://search.yahoo.com/search',
//    'https://www.bing.com/search',
//    'http://www.dogpile.com/search/web',
//    'https://www.google.com/search',
//    'https://www.wolframalpha.com/input/',
];
$data = ['q' => 'hello world'];

$curl = new MultiCurl();

$curl->success(function($instance) {
    echo 'call was successful. response was' . "\n";
    echo $instance->response . "\n";
});

$curl->error(function($instance) {
    echo 'call was unsuccessful.' . "\n";
    echo 'error code:' . $instance->error_code . "\n";
    echo 'error message:' . $instance->error_message . "\n";
});

$curl->complete(function($instance) {
    echo 'call completed' . "\n";
});

$curl->addGet($searchEngines, $data);
$curl->start();