<?php
namespace webbackuper\task\gzip;

use webbackuper\entity\Job;
use webbackuper\service\storage\TaskStorage;
use webbackuper\service\Viewer;

class gzip
{
    const TASK_NAME = 'gzip';
    const PATTERN_COMMAND = 'gzip -c %fileToArchiving% > %fileResult%';
    
    /**
     * @var gzipEntity
     */
    private $entity;

    /**
     * @var Job
     */
    private $job;

    function __construct($id = null)
    {
        if(is_null($id)) {
            $this->entity = new gzipEntity();
        } else {
            $TaskStorage = new TaskStorage();
            $this->entity = $TaskStorage->getById($id);
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

    public function view()
    {
        Viewer::render(self::TASK_NAME,
            array(
                'job'=>$this->job,
                'entity'=>$this->entity,
            )
        );
    }

    public function save()
    {

    }

    public function getEntity($data = null)
    {
        return new gzipEntity($data);
    }

    public function setJob(Job $job)
    {
        $this->job = $job;
    }

}