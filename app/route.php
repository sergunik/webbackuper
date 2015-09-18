<?php

\Webbackuper\base\Route::get('/', function() {
    $obj = new \Webbackuper\MainController();
    $obj->indexAction();
});

\webbackuper\base\Route::dispatch();