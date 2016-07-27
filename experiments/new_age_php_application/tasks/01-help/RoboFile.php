<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    /**
     * Calculate the fibonacci sequence between two numbers.
     *
     * Graphic output will look like
     *     +----+---+-------------+
     *     |    |   |             |
     *     |    |-+-|             |
     *     |----+-+-+             |
     *     |        |             |
     *     |        |             |
     *     |        |             |
     *     +--------+-------------+
     *
     * @param int $start Number to start from
     * @param $steps int Number of steps to perform
     * @param array $opts
     * @option $graphic Display the sequence graphically using cube
     *                  representation
     */
    public function fibonacci($start, $steps, $opts = ['graphic' => false])
    {
    }
}