<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\DeleteFactory;

use ZF2rapid\Task\AbstractTask;

/**
 * Class DeleteControllerPluginFactory
 *
 * @package ZF2rapid\Task\DeleteFactory
 */
abstract class AbstractDeleteFactory extends AbstractTask
{
    /**
     * Delete Factory
     *
     * @param string $classDir
     * @param string $className
     * @param string $classText
     *
     * @return boolean
     */
    public function deleteFactory($classDir, $className, $classText)
    {
        // set factory class
        $factoryFile = $classDir . '/' . $className . 'Factory.php';

        // check if factory file exists
        if (!file_exists($factoryFile)) {
            return true;
        }

        // output message
        $this->console->writeTaskLine(
            'Deleting ' . $classText . ' factory file...'
        );

        // delete file
        unlink($factoryFile);

        return true;
    }
}
