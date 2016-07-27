<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ImageCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'image:image';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    private function path($name)
    {
        $ds = DIRECTORY_SEPARATOR;
        return public_path() . "{$ds}images{$ds}{$name}";
    }

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $img = Image::make($this->path('el-capitan.jpg'));
        $img->resize(900, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->contrast(100);
        $img->gamma(2);
        $img->save($this->path('el-capitan-disstorstion.jpg'));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

}
