<?php
namespace webbackuper\controller;

use webbackuper\entity\Host;
use webbackuper\service\Request;
use webbackuper\service\HostStorage;
use webbackuper\service\Router;
use webbackuper\service\Viewer;

class HostController
{
    public function indexAction()
    {
        Viewer::render('Host:index');
//        Viewer::renderAjax('Host:index');
    }

    public function saveAction()
    {
        $Host = new Host();
        $Request = new Request();
        $HostStorage = new HostStorage();

        $Request->processing($Host);
        $HostStorage->saveHost($Host);

        Router::redirect('/host'); //todo: return value for ajax
    }
}