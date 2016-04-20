<?php
namespace webbackuper\task\gzip;

use webbackuper\service\storage\TaskStorage;

class gzip
{
//    const TASK_NAME = 'gzip';
    const PATTERN_COMMAND = 'gzip -c %fileToArchiving% > %fileResult%';
    
    /**
     * @var gzipEntity
     */
    private $entity;

    function __construct($id = null)
    {
        if(is_null($id)) {
            $this->entity = new gzipEntity();
        } else {
            $this->entity = TaskStorage::getById($id);
        }
    }

    public function generate()
    {
        $script = array();
        $script[] = $this->generateCommand(self::PATTERN_COMMAND);

        return implode( PHP_EOL, $script );
    }

    private function generateCommand($pattern) {
        $pattern = str_replace('%fileToArchiving%', $this->entity->fileToArchiving, $pattern);
        $pattern = str_replace('%fileResult%', $this->entity->fileResult, $pattern);

        return $pattern;
    }
}