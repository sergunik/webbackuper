<?php
namespace webbackuper\task\gzip;

use webbackuper\entity\Job;
use webbackuper\service\Generator;
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

    function __construct()
    {
        $this->entity = $this->getEntity();
    }

    public function generate()
    {
        $script = array();
        $script[] = Generator::SHEBANG;
        $script[] = '';
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