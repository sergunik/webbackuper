<?php
namespace webbackuper\controller;

use webbackuper\service\Viewer;

class MainController
{
    public function indexAction()
    {
        Viewer::render('Main:index');
    }
}