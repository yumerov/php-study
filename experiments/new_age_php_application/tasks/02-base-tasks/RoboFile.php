<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    public function execute()
    {
        $this
            ->taskExec('ls')
            ->arg('-la')
            ->run()
        ;

        // $this->_exec('ls -la'); // short syntax
    } # public function execute()

    public function executeStack()
    {
        $this
            ->taskExecStack()
            ->stopOnFail()
            ->exec('mkdir panda')
            ->exec('cd panda')
            ->run()
        ;
    } # public function executeStack()

    public function wtch()
    {
        $this
            ->taskWatch()
            ->monitor('.', function () {
                $this->say('Some changes in current directory. It is a good idea to something useful.');
            })
            ->run()
        ;
    } # public function wtch()

}