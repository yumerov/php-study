<?php

/*
|--------------------------------------------------------------------------
| Register The Artisan Commands
|--------------------------------------------------------------------------
|
| Each available Artisan command must be registered with the console so
| that it is available to be called. We'll register every command so
| the console gets access to each of the command object instances.
|
*/

Artisan::add(new FeedReaderCommand);
Artisan::add(new CsvCommand);
Artisan::add(new SearchableCommand);
Artisan::add(new InvokableCommand);
Artisan::add(new ImageCommand);