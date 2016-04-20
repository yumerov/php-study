<?php

function widget($prefix, $name, $data = [])
{
    $prefix = ucfirst($prefix);
    $class = preg_replace_callback("/(?:^|_)([a-z])/", function ($matches) {
        return strtoupper($matches[1]);
    }, $name) . "Widget";
    $full = $prefix . '\\' . $class;
    if (class_exists($full)) {
        $widget = new $full;
        return $widget->render($data);
    }
}