<?php
$ds = DIRECTORY_SEPARATOR;
require "..{$ds}vendor{$ds}autoload.php";
use \Curl\Curl;

define("BASE_URL", "http://swapi.co/api/");
$curl = new Curl();
$json = $curl->get(BASE_URL, ['people' => 1]);
//$json = $curl->get("http://swapi.co/api/people/1/");
var_dump($json);