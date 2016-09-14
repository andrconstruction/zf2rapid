<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2016 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Generator\FileGenerator;

/**
 * Class ClassFileGenerator
 *
 * @package ZF2rapid\Generator\FileGenerator
 */
class ClassFileGenerator extends AbstractFileGenerator
{
    /**
     * @var array
     */
    protected $config = [];

    /**
     * @param string $fileBody
     * @param array  $config
     */
    public function __construct($fileBody, array $config = [])
    {
        // set config data
        $this->config = $config;

        // call parent constructor
        parent::__construct();

        // set file body
        $this->setBody($fileBody);

        // add file doc block
        $this->addFileDocBlock();
    }
}