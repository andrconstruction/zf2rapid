<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2016 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\GenerateMap;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use ZF2rapid\Generator\ConfigArrayGenerator;
use ZF2rapid\Generator\FileGenerator\ConfigFileGenerator;
use ZFrapidCore\Task\AbstractTask;

/**
 * Class GenerateTemplateMap
 *
 * @package ZF2rapid\Task\GenerateMap
 */
class GenerateTemplateMap extends AbstractTask
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        // get templates
        $templates = scandir($this->params->moduleViewDir);

        // ignore current and parent path
        unset($templates[array_search('.', $templates)]);
        unset($templates[array_search('..', $templates)]);


        $entries = [];

        // check for project
        if ($this->params->paramWithProject && !empty($templates)) {
            // output message
            $this->console->writeTaskLine(
                'task_generate_map_template_map_running'
            );

            $templates = $this->findTemplateFilesInTemplatePath($this->params->moduleViewDir);

            $basePath = $this->params->moduleDir . '/view';
            $realPath = realpath($basePath);

            foreach ($templates as $file) {
                $file = str_replace('\\', '/', $file);

                $template = (0 === strpos($file, $realPath))
                    ? substr($file, strlen($realPath))
                    : $file;

                $template = (0 === strpos($template, $basePath))
                    ? substr($template, strlen($basePath))
                    : $template;

                $template = preg_match('#(?P<template>.*?)\.[a-z0-9]+$#i', $template, $matches)
                    ? $matches['template']
                    : $template;

                $template = preg_replace('#^\.*/#', '', $template);
                $file     = sprintf('__DIR__ . \'%s\'', str_replace($this->params->moduleDir, '', $file));

                $entries[$template] = $file;
            }
        }

        // create config array
        $config = new ConfigArrayGenerator($entries, $this->params);

        // create file
        $file = new ConfigFileGenerator(
            $config->generate(), $this->params->config
        );

        // setup map file
        $mapFile = $this->params->moduleDir . DIRECTORY_SEPARATOR
            . 'template_map.php';

        // write file
        file_put_contents($mapFile, $file->generate());

        return 0;
    }

    /**
     * @param $templatePath
     *
     * @return array
     */
    private function findTemplateFilesInTemplatePath($templatePath)
    {
        $rdi = new RecursiveDirectoryIterator($templatePath, RecursiveDirectoryIterator::FOLLOW_SYMLINKS);
        $rii = new RecursiveIteratorIterator($rdi, RecursiveIteratorIterator::LEAVES_ONLY);

        $files = [];
        foreach ($rii as $file) {
            if (! $file instanceof SplFileInfo) {
                continue;
            }

            if (! preg_match('#^phtml$#i', $file->getExtension())) {
                continue;
            }

            $files[] = $file->getPathname();
        }

        return $files;
    }

}