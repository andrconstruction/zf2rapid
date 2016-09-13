<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Filter;

use Zend\Filter\FilterInterface;
use Zend\Filter\Word\DashToCamelCase;
use Zend\Filter\Word\UnderscoreToCamelCase;

/**
 * Class NormalizeParam
 *
 * @package ZF2rapid\Filter
 */
class NormalizeParam implements FilterInterface
{
    /**
     * @param mixed $value
     *
     * @return string
     */
    public function filter($value)
    {
        $dashToCamelCaseFilter       = new DashToCamelCase();
        $underscoreToCamelCaseFilter = new UnderscoreToCamelCase();

        $value = $dashToCamelCaseFilter->filter($value);
        $value = $underscoreToCamelCaseFilter->filter($value);

        return $value;
    }

}