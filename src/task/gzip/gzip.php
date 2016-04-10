<?php
namespace webbackuper\task\gzip;

use webbackuper\entity\Job;
use webbackuper\service\Viewer;

class gzip
{
    const TASK_NAME = 'gzip';

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
        //implement
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