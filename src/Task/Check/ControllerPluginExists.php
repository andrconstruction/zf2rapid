<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\Check;

/**
 * Class ControllerPluginExists
 *
 * @package ZF2rapid\Task\Check
 */
class ControllerPluginExists extends AbstractFileExists
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        $result = $this->checkFileExists(
            $this->params->controllerPluginDir,
            $this->params->paramControllerPlugin,
            'controller plugin'
        );

        return $result == true ? 0 : 1;
    }

}