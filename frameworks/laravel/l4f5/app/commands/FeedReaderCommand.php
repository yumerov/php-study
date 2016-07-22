<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class FeedReaderCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'feed:read';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    protected $feedUrl = 'http://gamersvoiceshop.com/feed/';

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
        $tuiUnui = FeedReader::read($this->feedUrl);
        foreach ($tuiUnui->get_items() as $item)
        {
            $this->info(var_export([
                'id' => $item->get_id(),
                'title' => $item->get_title(),
                // 'description' => $item->get_description(),
                // 'content' => $item->get_content(),
            ], true));
        }
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
