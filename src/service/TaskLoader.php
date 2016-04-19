<?php
namespace webbackuper\service;

class TaskLoader {
    public static function get($name, $param = null)
    {
        $fullTaskName = 'webbackuper\\task\\'.$name.'\\'.$name;
        return new $fullTaskName($param);
    }
}