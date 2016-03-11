<?php

\Webbackuper\service\Router::get('/', '\Webbackuper\controller\MainController@indexAction');

\Webbackuper\service\Router::get('/(:alpha).css', function($style) {
    include DIR_CSS . $style . '.css';
});

\Webbackuper\service\Router::get('/(:alpha).js', function($script) {
    include DIR_JS . $script . '.js';
});

\Webbackuper\service\Router::get('/job_create', '\Webbackuper\controller\MainController@createAction');
\Webbackuper\service\Router::post('/job_save', '\Webbackuper\controller\MainController@saveAction');
\Webbackuper\service\Router::get('/job_list', '\Webbackuper\controller\MainController@listAction');
\Webbackuper\service\Router::get('/job_get/(:num)', '\Webbackuper\controller\MainController@getAction');

\Webbackuper\service\Router::get('/job_get/(:num)/task_create/(:alpha)', '\Webbackuper\controller\TaskController@createAction');
\Webbackuper\service\Router::post('/job_get/(:num)/task_save/(:alpha)', '\Webbackuper\controller\TaskController@saveAction');
\Webbackuper\service\Router::get('/job_get/(:num)/task_list', '\Webbackuper\controller\TaskController@listAction');

\Webbackuper\service\Router::get('/host', '\Webbackuper\controller\HostController@indexAction');
\Webbackuper\service\Router::post('/host_save', '\Webbackuper\controller\HostController@saveAction');


\Webbackuper\service\Router::dispatch();