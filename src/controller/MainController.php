<?php
namespace webbackuper\controller;

use webbackuper\entity\Job;
use webbackuper\service\Request;
use webbackuper\service\Router;
use webbackuper\service\JobStorage;
use webbackuper\service\Viewer;

class MainController
{
    public function indexAction()
    {
        Viewer::render('Main:index');
    }

    public function createAction()
    {
        Viewer::render('Main:jobCreate');
    }

    public function listAction()
    {
        $JobStorage = new JobStorage();
        $jobs = $JobStorage->getListObjects(); //todo: need name of entity

        Viewer::render('Main:jobList', array('jobs'=>$jobs));
    }

    public function getAction($id)
    {
        $JobStorage = new JobStorage();
        $Job = $JobStorage->get($id);

        Viewer::render('Main:jobInfo', array('job'=>$Job));
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