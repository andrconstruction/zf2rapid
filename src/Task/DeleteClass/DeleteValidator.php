<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\DeleteClass;

/**
 * Class DeleteValidator
 *
 * @package ZF2rapid\Task\DeleteClass
 */
class DeleteValidator extends AbstractDeleteClass
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        $result = $this->deleteClass(
            $this->params->validatorDir,
            $this->params->paramValidator,
            'validator'
        );

        return $result == true ? 0 : 1;
    }
}