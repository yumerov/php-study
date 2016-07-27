<?php

require "./vendor/autoload.php";

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{

    protected function say($text)
    {
        parent::say($text);
        return $this;
    } # protected function say($text)

    private function plsImpl($method)
    {
        throw new Exception("Implement {$method}!");
    }

    private function commands(Array $commands)
    {
        $this->taskExecStack()->stopOnFail();
        foreach ($commands as $command) {
            $this->exec($commands);
        }
        $this->run();
    } # private function commands()

    public function install()
    {
        $this->commands([
            'composer install',
            'php vendor/bin/bowerphp install',
        ]);
    } # public function install()

    public function update()
    {
        $this->commands([
            'composer update',
            'php vendor/bin/bowerphp update',
        ]);
    } # public function update()

    public function watch()
    {
        $sourceDir = 'public/src';
        $buildDir = 'public/build';
        $styleSourceDir = "{$sourceDir}/scss";
        $styleBuild = "{$buildDir}/app.css";
        $scriptSourceDir = "{$sourceDir}/js";
        $scriptBuild = "{$buildDir}/app.js";

        $this
            ->taskWatch()
            ->monitor($styleSourceDir, function () use ($styleSourceDir, $styleBuild) {
                $this
                    ->taskScss([
                        "{$styleSourceDir}/app.scss" => $styleBuild,
                    ])
                    ->importDir($styleSourceDir)
                    ->run()
                ;

                $this->taskMinify($styleBuild)->run();
            })
            ->monitor($scriptSourceDir, function () use ($scriptSourceDir, $scriptBuild) {
                $this
                    ->taskConcat([
                        "{$scriptSourceDir}/module-a.js",
                        "{$scriptSourceDir}/module-b.js",
                        "{$scriptSourceDir}/app.js",
                    ])
                    ->to($scriptBuild)
                    ->run()
                ;

                $this->taskMinify($scriptBuild)->run();
            })
            ->run()
        ;
    } # public function watch()
}