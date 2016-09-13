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
 * Class GenerateControllerFactory
 *
 * @package ZF2rapid\Task\GenerateFactory
 */
class GenerateControllerFactory extends AbstractGenerateFactory
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        $result = $this->generateFactory(
            $this->params->controllerDir,
            $this->params->paramController . 'Controller',
            'controller',
            $this->params->config['namespaceController'],
            'controllerManager'
        );

        return $result == true ? 0 : 1;
    }
}