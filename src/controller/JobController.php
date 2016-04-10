<?php
namespace webbackuper\controller;

use webbackuper\entity\Job;
use webbackuper\service\storage\JobStorage;
use webbackuper\service\Request;
use webbackuper\service\Router;
use webbackuper\service\Viewer;

class JobController
{
    public function createAction()
    {
        Viewer::render('Job:jobCreate');
    }

    public function listAction()
    {
        $JobStorage = new JobStorage();
        $jobs = $JobStorage->getAll();

        Viewer::render('Job:jobList', array('jobs'=>$jobs));
    }

    public function getAction($id)
    {
        $JobStorage = new JobStorage();
        $Job = $JobStorage->getById($id);

        Viewer::render('Job:jobInfo', array('job'=>$Job));
    }

    public function saveAction()
    {
        $Job = new Job();
        $Request = new Request();
        $JobStorage = new JobStorage();

        $Request->processing($Job);
        $JobStorage->save($Job);

        Router::redirect('/job_get/'.$Job->id);
    }
}