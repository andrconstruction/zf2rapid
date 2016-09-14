<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2016 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Generator\ClassGenerator;

use Zend\Code\Generator\GeneratorInterface;

/**
 * Class ControllerPluginClassGenerator
 *
 * @package ZF2rapid\Generator\ClassGenerator
 */
interface ClassGeneratorInterface extends GeneratorInterface
{
    /**
     * Build the class
     *
     * @param string $className
     * @param string $moduleName
     */
    public function build($className, $moduleName);
}