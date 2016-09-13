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
 * Class GenerateInputFilterFactory
 *
 * @package ZF2rapid\Task\GenerateFactory
 */
class GenerateInputFilterFactory extends AbstractGenerateFactory
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        $result = $this->generateFactory(
            $this->params->inputFilterDir,
            $this->params->paramInputFilter,
            'input filter',
            $this->params->config['namespaceInputFilter'],
            'inputFilterManager'
        );

        return $result == true ? 0 : 1;
    }
}