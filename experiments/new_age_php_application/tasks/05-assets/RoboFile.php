<?php

require "../../vendor/autoload.php";

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{

    public function minify()
    {
        $this
            ->taskMinify('minify/app.css')
            ->run()
        ;

        $this
            ->taskMinify('minify/app.js')
            ->run()
        ;
    } # public function minify()

    public function scss()
    {
        $this
            ->taskScss(['scss/app.scss' => 'scss/app.css'])
            ->importDir('scss/')
            ->run()
        ;
    } # public function scss()

}