<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class InvokableCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'invokable:invoke';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function invokeMe($a, array $b)
    {
        $this->info('a -> ' . json_encode($b, JSON_PRETTY_PRINT));
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $invoker = new Invoker\Invoker;

        $invoker->call(function ($command) {
            $command->info("'Hi' from " . __FUNCTION__ . ' with simple parameter');
        }, [$this]);

        $invoker->call(function ($command) {
            $command->info("'Hi' from " . __FUNCTION__ . ' with named parameter');
        }, ['command' => $this]);

        $invoker->call([$this, 'invokeMe'], [
            'a' => 'hello',
            'b' => [
                'level1' => [
                    'level2' => [
                        'level3' => ['data']
                    ]
                ]
            ]
        ]);

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
