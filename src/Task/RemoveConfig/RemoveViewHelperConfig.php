<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\RemoveConfig;

/**
 * Class RemoveViewHelperConfig
 *
 * @package ZF2rapid\Task\RemoveConfig
 */
class RemoveViewHelperConfig extends AbstractRemoveServiceManagerConfig
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
            'Writing view helper configuration...'
        );

        $configKey = lcfirst($this->params->paramModule)
            . $this->params->paramViewHelper;

        $result = $this->removeConfig(
            'view_helpers',
            $configKey
        );

        return $result == true ? 0 : 1;
    }
}