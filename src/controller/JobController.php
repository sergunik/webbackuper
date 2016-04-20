<?php
namespace webbackuper\controller;

use webbackuper\service\Generator;
use webbackuper\service\Request;
use webbackuper\service\Router;
use webbackuper\service\Viewer;
use webbackuper\service\storage\ScriptStorage;
use webbackuper\service\storage\JobStorage;

class JobController
{
    public function createAction()
    {
        Viewer::render('Job:jobCreate');
    }

    public function listAction()
    {
        Viewer::render(
            'Job:jobList',
            array(
                'jobs' => JobStorage::getAll()
            )
        );
    }

    public function getAction($id)
    {
        Viewer::render(
            'Job:jobInfo',
            array(
                'job' => JobStorage::getById($id)
            )
        );
    }

    public function saveAction()
    {
        $JobEntity = JobStorage::getNewEntity();
        $Request = new Request();

        $Request->processing($JobEntity);
        JobStorage::save($JobEntity->id, $JobEntity);

        Router::redirect('/job_get/'.$JobEntity->id);
    }

    public function buildAction($id)
    {
        $JobEntity = JobStorage::getById($id);
        $script = Generator::build($JobEntity);

        ScriptStorage::save($id, $script);

    }
}