<?php
namespace webbackuper\service;

use webbackuper\service\storage\JobStorage;

class Generator
{
    const EXTENSION =       'sh';
    const SHEBANG =         '#!/usr/bin/env sh';
    const REDIRECT_OUTPUT = '2>&1';

    public static function _getFilePath ()
    {
        return DIR_VAR_SH;
    }

    public static function _getFilename ($id)
    {
        return $id .'.'. self::EXTENSION;
    }

    public static function build($jobId)
    {
        $JobStorage = new JobStorage();
        $Job = $JobStorage->getById($jobId);

        $parts = array();
        $parts[] = self::SHEBANG;

        foreach($Job->tasks as $taskId)
        {
            $type = 'gzip';
            $Task = TaskLoader::get($type, $taskId);

            $parts[] = '';
            $parts[] = '#'.$type;
            $parts[] = $Task->generate();
            $parts[] = '';
        }

        $file = self::_getFilename($jobId);
        $content = implode(PHP_EOL, $parts);

        return IO::write(self::_getFilePath(), $file, $content);
    }
}