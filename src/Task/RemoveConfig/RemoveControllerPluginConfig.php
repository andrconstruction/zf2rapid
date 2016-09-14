<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2016 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\RemoveConfig;

/**
 * Class RemoveControllerPluginConfig
 *
 * @package ZF2rapid\Task\RemoveConfig
 */
class RemoveControllerPluginConfig extends AbstractRemoveServiceManagerConfig
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        // output message
        $this->console->writeTaskLine(
            'Writing controller plugin configuration...'
        );

        $configKey = lcfirst($this->params->paramModule)
            . $this->params->paramControllerPlugin;

        $result = $this->removeConfig(
            'controller_plugins',
            $configKey
        );

        return $result == true ? 0 : 1;
    }
}