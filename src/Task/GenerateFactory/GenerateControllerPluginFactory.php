<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\GenerateFactory;

/**
 * Class GenerateControllerPluginFactory
 *
 * @package ZF2rapid\Task\GenerateFactory
 */
class GenerateControllerPluginFactory extends AbstractGenerateFactory
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        $result = $this->generateFactory(
            $this->params->controllerPluginDir,
            $this->params->paramControllerPlugin,
            'controller plugin',
            $this->params->config['namespaceControllerPlugin'],
            'controllerPluginManager'
        );

        return $result == true ? 0 : 1;
    }
}