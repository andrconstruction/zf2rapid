<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2016 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Console;

use Traversable;
use Zend\I18n\Translator\Translator;
use ZF\Console\Dispatcher;
use ZFrapidCore\Console\Application as ZFrapidApplication;
use ZFrapidCore\Console\ConsoleInterface;

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

    /**
     * Application constructor.
     *
     * @param string            $name
     * @param string            $slogan
     * @param string            $version
     * @param array|Traversable $routes
     * @param ConsoleInterface  $console
     * @param Translator        $translator
     * @param Dispatcher        $dispatcher
     */
    public function __construct(
        $name, $slogan, $version, $routes, ConsoleInterface $console,
        Translator $translator = null, Dispatcher $dispatcher = null
    ) {
        $this->name    = $name;
        $this->slogan  = $slogan;
        $this->version = $version;

        parent::__construct($routes, $console, $translator, $dispatcher);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}
