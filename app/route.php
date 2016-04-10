<?php
//ToDo: remove namespaces

\webbackuper\service\Router::get('/', '\webbackuper\controller\MainController@indexAction');

\webbackuper\service\Router::get('/(:alpha).css', function($style) {
    include DIR_CSS . $style . '.css';
});

\webbackuper\service\Router::get('/(:alpha).js', function($script) {
    include DIR_JS . $script . '.js';
});

\webbackuper\service\Router::get    ('/job_create',     '\webbackuper\controller\JobController@createAction');
\webbackuper\service\Router::post   ('/job_save',       '\webbackuper\controller\JobController@saveAction');
\webbackuper\service\Router::get    ('/job_list',       '\webbackuper\controller\JobController@listAction');
\webbackuper\service\Router::get    ('/job_get/(:num)', '\webbackuper\controller\JobController@getAction');

\webbackuper\service\Router::get    ('/job_get/(:num)/task_create/(:alpha)', '\webbackuper\controller\TaskController@createAction');
\webbackuper\service\Router::post   ('/job_get/(:num)/task_save/(:alpha)', '\webbackuper\controller\TaskController@saveAction');
\webbackuper\service\Router::get    ('/task_get/(:num)', '\webbackuper\controller\TaskController@getAction');
\webbackuper\service\Router::get    ('/job_get/(:num)/task_list', '\webbackuper\controller\TaskController@listAction');


\webbackuper\service\Router::dispatch();