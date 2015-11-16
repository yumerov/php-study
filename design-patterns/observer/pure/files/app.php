<?php

require 'Event.php';
require 'Listeners.php';
require 'InvokableListener.php';

Event::registerCallback('init', function ($data) {
	var_dump($data);
});

Event::registerCallback('finish', array('Listeners', 'listen'));

Event::registerCallback('middle', new InvokableListener());

Event::trigger('init', array('hello'));
Event::trigger('middle', array('world'));
Event::trigger('finish', array('!'));