<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Console;

use ZFrapidCore\Console\Application as ZFrapidApplication;

/**
 * Class Application
 *
 * @package ZF2rapid\Console
 */
class Application extends ZFrapidApplication
{
    /**
     * @var string
     */
    protected $name = 'ZF2rapid';

    /**
     * @var string
     */
    protected $slogan = 'Rapid Application Development Tool for the ZF2';

    /**
     * @var string
     */
    protected $version = '0.8.0';
}
