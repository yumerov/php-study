<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    public function clean()
    {
        $this
            ->taskCleanDir(['logs'])
            ->run()
        ;

        // $this->_cleanDir('app/cache'); # as shortcut
    } # public function clean()

    public function copy()
    {
        $this
            ->taskCopyDir(['dist/config' => 'config'])
            ->run()
        ;

        // $this->_copyDir('dist/config', 'config'); # as shortcut
    } # public function copy()

    public function stack()
    {
        $this
            ->taskFileSystemStack()
            ->mkdir('cache')
            ->touch('cache/.gitignore')
            ->symlink('nginx/error.log', 'logs/error.log')
            ->run()
        ;
    } # public function stack()

    public function mirror()
    {
        $this
            ->taskMirrorDir(['local/' => 'cdn/'])
            ->run()
        ;
    } # public function mirror()

}