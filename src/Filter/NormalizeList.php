<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Filter;

use Zend\Filter\Word\DashToCamelCase;
use Zend\Filter\Word\UnderscoreToCamelCase;
use ZF\Console\Filter\Explode;

/**
 * Class NormalizeList
 *
 * @package ZF2rapid\Filter
 */
class NormalizeList extends Explode
{
    /**
     * @param mixed $value
     *
     * @return array|mixed
     */
    public function filter($value)
    {
        $list = parent::filter($value);

        $dashToCamelCaseFilter       = new DashToCamelCase();
        $underscoreToCamelCaseFilter = new UnderscoreToCamelCase();

        foreach ($list as $listKey => $listOption) {
            $listOption = $dashToCamelCaseFilter->filter($listOption);
            $listOption = $underscoreToCamelCaseFilter->filter($listOption);

            $list[$listKey] = $listOption;
        }

        return $list;
    }

}