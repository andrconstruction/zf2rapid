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
namespace ZF2rapid\Command;

use ZF2rapid\Console\ConsoleInterface;
use ZF\Console\Route;

/**
 * Class CommandInterface
 *
 * @package ZF2rapid\Command
 */
interface CommandInterface
{
    /**
     * Start command processing
     *
     * @param Route            $route
     * @param ConsoleInterface $console
     *
     * @return integer
     */
    public function __invoke(Route $route, ConsoleInterface $console);

    /**
     * Start the command
     */
    public function startCommand();

    /**
     * Stop the command
     */
    public function stopCommand();
}