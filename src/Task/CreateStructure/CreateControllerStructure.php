<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\CreateStructure;

/**
 * Class CreateControllerStructure
 *
 * @package ZF2rapid\Task\Controller
 */
class CreateControllerStructure extends AbstractCreateStructureTask
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        $result = $this->createDirectory(
            $this->params->controllerDir, 'Controller'
        );

        if (!$result) {
            return 1;
        }

        $result = $this->createDirectory(
            $this->params->controllerViewDir, 'Controller view'
        );

        return $result == true ? 0 : 1;
    }

}