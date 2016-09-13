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
 * Class GenerateViewHelperFactory
 *
 * @package ZF2rapid\Task\GenerateFactory
 */
class GenerateViewHelperFactory extends AbstractGenerateFactory
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        $result = $this->generateFactory(
            $this->params->viewHelperDir,
            $this->params->paramViewHelper,
            'view helper',
            $this->params->config['namespaceViewHelper'],
            'viewHelperManager'
        );

        return $result == true ? 0 : 1;
    }
}