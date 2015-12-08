<?php
namespace Webbackuper\controller;

use Webbackuper\entity\Host;
use Webbackuper\service\Request;
use Webbackuper\service\HostStorage;
use Webbackuper\service\Router;
use Webbackuper\service\Viewer;

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