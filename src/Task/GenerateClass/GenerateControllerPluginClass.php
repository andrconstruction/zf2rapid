<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\GenerateClass;

use ZF2rapid\Generator\ControllerPluginClassGenerator;

/**
 * Class GenerateControllerPluginClass
 *
 * @package ZF2rapid\Task\GenerateClass
 */
class GenerateControllerPluginClass extends AbstractGenerateClass
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        $result = $this->generateClass(
            $this->params->controllerPluginDir,
            $this->params->paramControllerPlugin,
            'controller plugin',
            new ControllerPluginClassGenerator($this->params->config)
        );

        return $result == true ? 0 : 1;
    }
}