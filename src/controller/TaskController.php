<?php
namespace webbackuper\controller;

use webbackuper\service\Request;
use webbackuper\service\Router;
use webbackuper\service\storage\JobStorage;
use webbackuper\service\TaskLoader;
use webbackuper\service\storage\TaskStorage;
use webbackuper\service\Viewer;

class TaskController
{
    public function createAction($jobId, $taskName)
    {
        $JobStorage = new JobStorage();
        $Job = $JobStorage->getById($jobId);

        $Task = TaskLoader::get($taskName);
        $Task->setJob($Job);
        $Task->view();
    }

    public function listAction($jobId)
    {
        $JobStorage = new JobStorage();
        $Job = $JobStorage->getById($jobId);
        $taskListIds = $Job->tasks;

        $TaskStorage = new TaskStorage();

        $tasks = array();
        foreach ($taskListIds as $taskId)
        {
            $tasks[] = $TaskStorage->getById($taskId);
        }

        Viewer::render('Task:taskList', array('tasks'=>$tasks));
    }

    public function getAction($id)
    {
        $TaskStorage = new TaskStorage();
        $Task = $TaskStorage->getById($id);

        Viewer::render('Task:taskInfo', array('task'=>$Task));
    }

    public function saveAction($jobId, $taskName)
    {
        $Task = TaskLoader::get($taskName);
        $TaskEntity = $Task->getEntity();

        $Request = new Request();
        $Request->processing($TaskEntity);

        $TaskStorage = new TaskStorage();
        $TaskStorage->save($TaskEntity);

        $JobStorage = new JobStorage();
        $Job = $JobStorage->getById($jobId);
        $Job->tasks[] = $TaskEntity->id;
        $JobStorage->save($Job);

        Router::redirect('/task_get/'.$TaskEntity->id);
    }
}