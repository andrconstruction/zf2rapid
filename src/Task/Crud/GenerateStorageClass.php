<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2016 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\Crud;

use ZF2rapid\Generator\ClassGenerator\StorageClassGenerator;
use ZF2rapid\Task\GenerateClass\AbstractGenerateClass;

/**
 * Class GenerateStorageClass
 *
 * @package ZF2rapid\Task\GenerateClass
 */
class GenerateStorageClass extends AbstractGenerateClass
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        foreach ($this->params->tableConfig as $tableKey => $tableConfig) {
            $result = $this->generateClass(
                $this->params->storageDir,
                $tableConfig['storageClass'],
                'storage',
                new StorageClassGenerator(
                    $this->params->config,
                    $tableKey,
                    $this->params->loadedTables
                )
            );

            if (!$result) {
                return 1;
            }
        }

        return 0;
    }

}