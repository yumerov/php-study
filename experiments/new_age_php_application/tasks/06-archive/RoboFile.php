<?php

require "../../vendor/autoload.php";

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{

    public function pack()
    {
        $this
            ->taskPack('pack/backup.zip')
            ->add('pack/site')
            ->run()
        ;
    } # public function pack()

    public function extract()
    {
        $this
            ->taskExtract('pack/backup.zip')
            ->to('extract')
            ->preserveTopDirectory(false) // the default
            ->run()
        ;
    } # public function extract()

}