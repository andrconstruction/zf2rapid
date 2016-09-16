<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2016 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\Crud;

use Zend\Console\ColorInterface as Color;
use ZF2rapid\Generator\FileGenerator\ClassFileGenerator;
use ZF2rapid\Generator\CrudGenerator\StorageFactoryGenerator;
use ZFrapidCore\Task\AbstractTask;

/**
 * Class GenerateStorageFactory
 *
 * @package ZF2rapid\Task\GenerateFactory
 */
class GenerateStorageFactory extends AbstractTask
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        foreach ($this->params->tableConfig as $tableKey => $tableConfig) {
            // output message
            $this->console->writeTaskLine(
                'task_generate_factory_writing',
                [
                    'storage'
                ]
            );

            // set factory file
            $factoryFile = $this->params->storageDir . '/'
                . $tableConfig['storageClass'] . 'Factory.php';

            // check if factory file exists
            if (file_exists($factoryFile)) {
                $this->console->writeFailLine(
                    'task_generate_factory_exists',
                    [
                        'storage',
                        $this->console->colorize(
                            $tableConfig['storageClass'], Color::GREEN
                        ),
                        $this->console->colorize(
                            $this->params->paramModule, Color::GREEN
                        )
                    ]
                );

                return 1;
            }

            // create class
            $class = new StorageFactoryGenerator(
                $tableConfig['storageClass'],
                $this->params->paramModule,
                $tableKey,
                $this->params->config,
                $this->params->loadedTables
            );

            // create file
            $file = new ClassFileGenerator(
                $class->generate(), $this->params->config
            );

            // write file
            file_put_contents($factoryFile, $file->generate());

        }

        return 0;
    }
}