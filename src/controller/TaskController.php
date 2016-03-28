<?php
namespace webbackuper\controller;

use webbackuper\entity\Job;
use webbackuper\service\Request;
use webbackuper\service\Router;
use webbackuper\service\JobStorage;
use webbackuper\service\TaskStorage;
use webbackuper\service\Viewer;

class TaskController
{
    public function indexAction()
    {
        Viewer::render('Task:index');
    }

    public function createAction($jobId, $taskName)
    {
        $JobStorage = new JobStorage();
        $Job = $JobStorage->get($jobId);

        $fullTaskName = 'webbackuper\\task\\'.$taskName.'\\'.$taskName;
        $Task = new $fullTaskName();

        $fullTaskName .= 'Entity';
        $TaskEntity = new $fullTaskName();


        Viewer::render($taskName, ['job'=>$Job, 'entity'=>$TaskEntity]);
    }

    public function listAction($jobId)
    {
        $TaskStorage = new TaskStorage($jobId);
        $tasks = $TaskStorage->getListObjects();

        Viewer::render('Task:taskList', array('tasks'=>$tasks));
    }

//    public function getJobAction($id)
//    {
//        $JobStorage = new JobStorage();
//        $Job = $JobStorage->get($id);
//
//        Viewer::render('Main:jobInfo', array('job'=>$Job));
//    }
//
    public function saveAction($jobId, $taskName)
    {
        $JobStorage = new JobStorage();
        $Job = $JobStorage->get($jobId);

        $fullTaskName = 'webbackuper\\task\\'.$taskName.'\\'.$taskName;
        $Task = new $fullTaskName();

        $fullTaskName .= 'Entity';
        $TaskEntity = new $fullTaskName();

        $Request = new Request();
        $Request->processing($TaskEntity);

        $TaskStorage = new TaskStorage($jobId);
        $TaskStorage->save($TaskEntity);

        Router::redirect('/job_get/'.$jobId.'/task_create/'.$taskName);
    }
}