<?php

//GENERAL
define('PROJECT_NAME', 'WebBackUper');
define('PROJECT_VERSION', 'v0.1');

//DIRECTORIES
define('DIR_VIEW', __DIR__ . '/../src/view/');
define('DIR_TASK', __DIR__ . '/../src/task/');

define('DIR_WEB', __DIR__ . '/../www/');
define('DIR_CSS', DIR_WEB . 'css/');
define('DIR_JS', DIR_WEB . 'js/');

define('DIR_ROOT', __DIR__ . '/../');
define('DIR_VAR', DIR_ROOT . 'var/');
define('DIR_VAR_JOBS', DIR_VAR . 'jobs/');
define('DIR_VAR_TASKS', DIR_VAR . 'tasks/');
define('DIR_VAR_SH', DIR_VAR . 'sh/');

define('TASK_NAMESPACE', 'webbackuper\\task\\%type%\\%type%Entity');