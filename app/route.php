<?php

\Webbackuper\service\Route::get('/', '\Webbackuper\controller\MainController@indexAction');

\Webbackuper\service\Route::get('/(:alpha).css', function($style) {
    include DIR_CSS . $style . '.css';
});

\Webbackuper\service\Route::get('/(:alpha).js', function($script) {
    include DIR_JS . $script . '.js';
});

\Webbackuper\service\Route::get('/add_job', '\Webbackuper\controller\MainController@addJobAction');
\Webbackuper\service\Route::get('/list_job', '\Webbackuper\controller\MainController@listJobAction');

\Webbackuper\service\Route::post('/save_job', '\Webbackuper\controller\MainController@saveJobAction');


\Webbackuper\service\Route::dispatch();