<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2016 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Generator\ClassGenerator;

use Zend\Code\Generator\AbstractGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlock\Tag\GenericTag;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Db\Metadata\Object\ConstraintObject;
use Zend\Filter\StaticFilter;

/**
 * Class StorageClassGenerator
 *
 * @package ZF2rapid\Generator\ClassGenerator
 */
class StorageClassGenerator extends ClassGenerator
    implements ClassGeneratorInterface
{
    /**
     * @var array
     */
    protected $config = [];

    /**
     * @var string
     */
    protected $tableName;

    /**
     * @var array
     */
    protected $loadedTables;

    /**
     * @param array  $config
     * @param string $tableName
     * @param array  $loadedTables
     */
    public function __construct(
        array $config = [], $tableName, array $loadedTables = []
    ) {
        // set config data
        $this->config       = $config;
        $this->tableName    = $tableName;
        $this->loadedTables = $loadedTables;

        // call parent constructor
        parent::__construct();
    }

    /**
     * Build the class
     *
     * @param string $className
     * @param string $moduleName
     */
    public function build($className, $moduleName)
    {
        // set name and namespace
        $this->setName($className);
        $this->setNamespaceName(
            $moduleName . '\\' . $this->config['namespaceStorage']
        );

        // add used namespaces and extended classes
        $this->addUse('ZFrapidDomain\Storage\AbstractStorage');
        $this->setExtendedClass('AbstractStorage');
        $this->addClassDocBlock($className, $moduleName);

        // add getOptions method if needed
        $this->addGetOptionsMethod($moduleName);
    }

    /**
     * Add a class doc block
     *
     * @param string $className
     * @param string $moduleName
     */
    protected function addClassDocBlock($className, $moduleName)
    {
        // check for api docs
        if ($this->config['flagAddDocBlocks']) {
            $this->setDocBlock(
                new DocBlockGenerator(
                    $this->getName(),
                    'Provides the ' . $className . ' storage for the '
                    . $moduleName . ' Module',
                    [
                        new GenericTag('package', $this->getNamespaceName()),
                    ]
                )
            );
        }
    }

    /**
     * Add a getOptions() method if table has an external dependency
     *
     * @param $moduleName
     *
     * @return MethodGenerator
     */
    protected function addGetOptionsMethod($moduleName)
    {
        $entityClass = $this->filterUnderscoreToCamelCase($this->tableName)
            . 'Entity';

        /** @var ConstraintObject $primaryKey */
        $primaryKey = $this->loadedTables[$this->tableName]['primaryKey'];

        $body   = [];
        $body[] = '$options = [];';
        $body[] = '';
        $body[] = '/** @var ' . $entityClass . ' $entity */';
        $body[] = 'foreach ($this->fetchAllEntities() as $entity) {';
        $body[] = '    $columns = [';

        foreach (
            $this->loadedTables[$this->tableName]['columns'] as $columnName =>
            $columnType
        ) {
            if (in_array($columnName, $primaryKey->getColumns())) {
                continue;
            }

            $getMethod = 'get' . ucfirst(
                    $this->filterUnderscoreToCamelCase($columnName)
                );

            $body[] = '        $entity->' . $getMethod . '(),';
        }

        $body[] = '    ];';
        $body[] = '';
        $body[]
                = '    $options[$entity->getIdentifier()] = implode(\' \', $columns);';
        $body[] = '}';
        $body[] = '';
        $body[] = 'return $options;';

        $body = implode(AbstractGenerator::LINE_FEED, $body);

        $this->addUse(
            $moduleName . '\\' . $this->config['namespaceEntity'] . '\\'
            . $entityClass
        );

        $selectMethod = new MethodGenerator('getOptions');
        $selectMethod->addFlag(MethodGenerator::FLAG_PUBLIC);
        $selectMethod->setDocBlock(
            new DocBlockGenerator(
                'Get option list',
                null,
                [
                    [
                        'name'        => 'return',
                        'description' => 'array',
                    ],
                ]
            )
        );

        $selectMethod->setBody($body);

        $this->addMethodFromGenerator($selectMethod);

        return true;
    }

    /**
     * Filter underscore to camel case
     *
     * @param string $text
     *
     * @return string
     */
    public function filterUnderscoreToCamelCase($text)
    {
        $text = StaticFilter::execute($text, 'Word\UnderscoreToCamelCase');

        return $text;
    }
}
