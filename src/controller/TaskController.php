<?php
namespace webbackuper\controller;

use webbackuper\service\Request;
use webbackuper\service\Router;
use webbackuper\service\Viewer;
use webbackuper\service\storage\JobStorage;
use webbackuper\service\storage\TaskStorage;

class TaskController
{
    public function createAction($jobId, $taskName)
    {
        Viewer::render($taskName,
            array(
                'job' => JobStorage::getById($jobId),
                'entity' => TaskStorage::getNewEntity($taskName),
            )
        );
    }

    public function listAction($jobId)
    {
        $JobEntity = JobStorage::getById($jobId);

        $tasks = array();
        foreach ($JobEntity->tasks as $taskId)
        {
            $tasks[] = TaskStorage::getById($taskId);
        }

        Viewer::render(
            'Task:taskList',
            array('tasks'=>$tasks)
        );
    }

    public function getAction($id)
    {
        Viewer::render(
            'Task:taskInfo',
            array(
                'task' => TaskStorage::getById($id)
            )
        );
    }

    public function saveAction($jobId, $taskName)
    {
        $TaskEntity = TaskStorage::getNewEntity($taskName);

        $Request = new Request();
        $Request->processing($TaskEntity);

        TaskStorage::save($TaskEntity->id, $TaskEntity);

        $JobEntity = JobStorage::getById($jobId);
        $JobEntity->tasks[] = $TaskEntity->id;
        JobStorage::save($jobId, $JobEntity);

        Router::redirect('/task_get/'.$TaskEntity->id);
    }
}