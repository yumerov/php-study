<?php

require 'StaticRegistry.php';

StaticRegistry::set('hello', 'world');

echo StaticRegistry::get('hello');

StaticRegistry::set(NULL, NULL);