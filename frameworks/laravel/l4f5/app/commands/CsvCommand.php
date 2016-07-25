<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class CsvCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'csv:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    const ACTION_KEY = 'action';

    const ACTION_READ = 'read';

    const ACTION_WRITE = 'write';

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
        $action = $this->option(self::ACTION_KEY);

        if ($action === self::ACTION_READ) {
            $output = var_export(
                CSV::fromFile(storage_path().'/csv/sample.csv')->toArray(), true);
        } elseif ($action === self::ACTION_WRITE) {
            $output = CSV::with([
                [1, "John"],
                [2, "Tim"],
                [3, "Benjamin"],
            ])->put(storage_path().'/csv/users.csv');
        } else {
            $output = 'I do not know what to do.';
        }

        $this->info($output);
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
        return [
            [
                self::ACTION_KEY,
                null,
                InputOption::VALUE_REQUIRED,
                self::ACTION_READ . ' or ' . self::ACTION_WRITE,
                self::ACTION_READ,
            ],
        ];
    }

}
