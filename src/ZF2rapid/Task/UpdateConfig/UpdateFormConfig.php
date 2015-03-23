<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\UpdateConfig;

/**
 * Class UpdateFormConfig
 *
 * @package ZF2rapid\Task\UpdateConfig
 */
class UpdateFormConfig extends AbstractUpdateServiceManagerConfig
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
            'Writing form configuration...'
        );

        $configKey = lcfirst($this->params->paramModule)
            . $this->params->paramForm;

        $result = $this->updateConfig(
            'controller_plugins',
            $configKey,
            $this->params->paramForm,
            $this->params->config['namespaceForm']
        );

        return $result == true ? 0 : 1;
    }
}