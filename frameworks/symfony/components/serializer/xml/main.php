<?php

define('DS', DIRECTORY_SEPARATOR);
define('PATH_PREFIX', __DIR__ . DS);

require PATH_PREFIX . '..' . DS . 'vendor' . DS . 'autoload.php';
require PATH_PREFIX . 'Person.php';

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

$encoders = array(new XmlEncoder(), new JsonEncoder());
$normalizers = array(new ObjectNormalizer());

$serializer = new Serializer($normalizers, $encoders);

$data = <<<EOF
<person>
    <name>foo</name>
    <age>99</age>
    <sportsman>false</sportsman>
</person>
EOF;

var_dump($serializer->deserialize($data, 'Person', 'xml'));
