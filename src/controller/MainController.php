<?php
namespace Webbackuper\controller;

use Webbackuper\entity\Job;
use Webbackuper\service\Request;
use Webbackuper\service\Router;
use Webbackuper\service\Storage;
use Webbackuper\service\Viewer;

class MainController
{
    public function indexAction()
    {
        Viewer::render('Main:index');
    }

    public function addJobAction()
    {
        Viewer::render('Main:addJob');
    }

    public function listJobAction()
    {
        $Storage = new Storage();
        $jobs = $Storage->getJobList();

        Viewer::render('Main:listJob', array('jobs'=>$jobs));
    }

    public function saveJobAction()
    {
        $Job = new Job();
        $Request = new Request();
        $Storage = new Storage();

        $Request->processing($Job);
        $Storage->saveEntity($Job);

        Router::redirect('/list_job');
    }
}