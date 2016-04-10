<?php
namespace webbackuper\service;

class TaskLoader {
    public static function get($name)
    {
        $fullTaskName = 'webbackuper\\task\\'.$name.'\\'.$name;
        return new $fullTaskName();
    }
}