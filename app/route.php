<?php

\Webbackuper\service\Router::get('/', '\Webbackuper\controller\MainController@indexAction');

\Webbackuper\service\Router::get('/(:alpha).css', function($style) {
    include DIR_CSS . $style . '.css';
});

\Webbackuper\service\Router::get('/(:alpha).js', function($script) {
    include DIR_JS . $script . '.js';
});

\Webbackuper\service\Router::get('/add_job', '\Webbackuper\controller\MainController@addJobAction');
\Webbackuper\service\Router::get('/list_job', '\Webbackuper\controller\MainController@listJobAction');

\Webbackuper\service\Router::post('/save_job', '\Webbackuper\controller\MainController@saveJobAction');


\Webbackuper\service\Router::dispatch();