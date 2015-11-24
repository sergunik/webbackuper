<?php
namespace Webbackuper\controller;

use Webbackuper\entity\Job;
use Webbackuper\service\Request;
use Webbackuper\service\Route;
use Webbackuper\service\Storage;

class MainController
{
    public function indexAction()
    {
        require DIR_VIEW . 'main.php';
    }

    public function addJobAction()
    {
        require DIR_VIEW . 'addJob.php';
    }

    public function listJobAction()
    {
        $Storage = new Storage();
        $jobs = $Storage->getJobList();

        require DIR_VIEW . 'listJob.php';
    }

    public function saveJobAction()
    {
        $Job = new Job();
        $Request = new Request();
        $Storage = new Storage();

        $Request->processing($Job);
        $Storage->saveEntity($Job);

        Route::redirect('/list_job');
    }
}