<?php
/**
 * ZF2rapid - Zend Framework 2 Rapid Development Tool
 *
 * @link      https://github.com/ZFrapid/zf2rapid
 * @copyright Copyright (c) 2014 - 2015 Ralf Eggert
 * @license   http://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace ZF2rapid\Task\DeleteViews;

use ZF2rapid\Task\AbstractTask;

/**
 * Class RemoveControllerViews
 *
 * @package ZF2rapid\Task\DeleteViews
 */
class RemoveControllerViews extends AbstractTask
{
    /**
     * Process the command
     *
     * @return integer
     */
    public function processCommandTask()
    {
        // output message
        $this->console->writeTaskLine(
            'task_delete_views_controller_view_path'
        );

        // create src module
        if (!is_dir($this->params->controllerViewDir)) {
            return 1;
        }

        $this->deleteDirectory($this->params->controllerViewDir);

        return 0;
    }

    /**
     * Delete directory and all of its files and sub directories
     *
     * @param string $dirPath
     */
    protected function deleteDirectory($dirPath)
    {
        if (is_dir($dirPath)) {
            $objects = scandir($dirPath);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dirPath . DIRECTORY_SEPARATOR . $object)
                        == "dir"
                    ) {
                        $this->deleteDirectory(
                            $dirPath . DIRECTORY_SEPARATOR . $object
                        );
                    } else {
                        unlink($dirPath . DIRECTORY_SEPARATOR . $object);
                    }
                }
            }
            reset($objects);
            rmdir($dirPath);
        }
    }
}