<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    public function concat()
    {
        $this
            ->taskConcat([
                'assets/screen.css',
                'assets/print.css',
                'assets/theme.css',
            ])
            ->to('assets/style.css')
            ->run()
        ;
    } # public function concat()

    public function replace()
    {
        $this
            ->taskReplaceInFile('box/parameters.yml')
            ->from(['##dbname##', '##dbhost##'])
            ->to(['robo', 'localhost'])
            ->run()
        ;
    } # public function replace()

    public function write()
    {
        $domain = 'example.com';
        $path = 'example';
        $name = 'example';

        $this
            ->taskWriteToFile("/etc/apache2/sites-available/{$domain}.conf")
            ->lines([
                '<VirtualHost *:80>',
                "    ServerName {$domain}",
                "",
                "    DocumentRoot \"/var/www/{$path}\"",
                "    ErrorLog ${APACHE_LOG_DIR}/{$name}.error.log",
                "    CustomLog ${APACHE_LOG_DIR}/{$name}.access.log combined",
                "</VirtualHost>",
            ])
            ->run()
        ;
    } # public function write()

}