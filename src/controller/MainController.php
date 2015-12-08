<?php
namespace Webbackuper\controller;

use Webbackuper\entity\Job;
use Webbackuper\service\Generator;
use Webbackuper\service\HostStorage;
use Webbackuper\service\Request;
use Webbackuper\service\Router;
use Webbackuper\service\JobStorage;
use Webbackuper\service\Viewer;

class MainController
{
    public function indexAction()
    {
        Viewer::render('Main:index');
    }

    public function addJobAction()
    {
        $HostStorage = new HostStorage();
        $hostList = $HostStorage->getList();
        Viewer::render('Main:addJob', array('hostList'=>$hostList));
    }

    public function listJobAction()
    {
        $JobStorage = new JobStorage();
        $jobs = $JobStorage->getList();

        Viewer::render('Main:listJob', array('jobs'=>$jobs));
    }

    public function saveJobAction()
    {
        $Job = new Job();
        $Request = new Request();
        $JobStorage = new JobStorage();
        $HostStorage = new HostStorage();
        $Generator = new Generator($HostStorage);

        $Request->processing($Job);
        $JobStorage->saveJob($Job);
        $Generator->generate($Job);

        Router::redirect('/job_list');
    }
}