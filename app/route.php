<?php

\Webbackuper\service\Router::get('/', '\Webbackuper\controller\MainController@indexAction');

\Webbackuper\service\Router::get('/(:alpha).css', function($style) {
    include DIR_CSS . $style . '.css';
});

\Webbackuper\service\Router::get('/(:alpha).js', function($script) {
    include DIR_JS . $script . '.js';
});

\Webbackuper\service\Router::get('/job_add', '\Webbackuper\controller\MainController@addJobAction');
\Webbackuper\service\Router::get('/job_list', '\Webbackuper\controller\MainController@listJobAction');
\Webbackuper\service\Router::post('/job_save', '\Webbackuper\controller\MainController@saveJobAction');

\Webbackuper\service\Router::get('/host', '\Webbackuper\controller\HostController@indexAction');
\Webbackuper\service\Router::post('/host_save', '\Webbackuper\controller\HostController@saveAction');


\Webbackuper\service\Router::dispatch();