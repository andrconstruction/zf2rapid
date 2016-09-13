<?php
/**
 * Norderney.info
 *
 * @package    MODULENAME
 * @link       http://www.norderney.info
 * @copyright  Copyright (c) 2014 Ralf Eggert, Travello GmbH
 * @license    All rights reserved
 */

/**
 * namespace definition and usage
 */
namespace ZF2rapid\Task;

use Zend\Stdlib\Parameters;
use ZF\Console\Route;
use ZF2rapid\Console\ConsoleInterface;

/**
 * Class TaskInterface
 *
 * @package ZF2rapid\Task
 */
interface TaskInterface
{
    /**
     * Start command task processing
     *
     * @param Route            $route
     * @param ConsoleInterface $console
     * @param Parameters       $params
     *
     * @return int
     */
    public function __invoke(Route $route, ConsoleInterface $console, Parameters $params);

    /**
     * Process the command task
     *
     * @return integer
     */
    public function processCommandTask();
}