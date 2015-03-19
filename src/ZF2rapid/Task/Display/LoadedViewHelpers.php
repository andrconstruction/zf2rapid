<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\Display;

use Zend\Console\ColorInterface as Color;
use ZF2rapid\Task\AbstractTask;

/**
 * Class LoadedViewHelpers
 *
 * @package ZF2rapid\Task\Display
 */
class LoadedViewHelpers extends AbstractTask
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        // output done message
        $this->console->writeTaskLine(
            'The following view helpers were found in '
            . $this->console->colorize($this->params->projectPath, Color::GREEN)
        );

        // loop through modules
        foreach ($this->params->loadedModules as $moduleName => $moduleObject) {
            $this->console->writeListItemLine(
                'Module ' . $this->console->colorize(
                    $moduleName, Color::GREEN
                ) . ' (Class ' . $this->console->colorize(
                    get_class($moduleObject), Color::BLUE
                ) . ')'
            );

            // check for empty view helper list
            if (empty($this->params->loadedViewHelpers[$moduleName])) {
                $this->console->writeListItemLineLevel2('No view helpers found');

                continue;
            }

            // loop through view helpers
            foreach (
                $this->params->loadedViewHelpers[$moduleName]
                as $pluginType => $pluginList
            ) {
                $this->console->writeListItemLineLevel2(
                    'Type ' . $this->console->colorize(
                        $pluginType, Color::GREEN
                    ),
                    false
                );

                // output view helpers for module
                foreach (
                    $pluginList as $pluginName => $pluginClass
                ) {
                    $this->console->writeListItemLineLevel3(
                        'ViewHelper ' . $this->console->colorize(
                            $pluginName, Color::GREEN
                        ) . ' (Class ' . $this->console->colorize(
                            $pluginClass, Color::BLUE
                        ) . ')',
                        false
                    );
                }
            }
        }

        return 0;
    }

}