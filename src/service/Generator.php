<?php
namespace webbackuper\service;

use webbackuper\entity\JobEntity;

class Generator
{
    const SHEBANG           = '#!/usr/bin/env sh';
    const REDIRECT_OUTPUT   = '2>&1';

    public static function build(JobEntity $JobEntity)
    {
        $parts = array();
        $parts[] = self::SHEBANG;

        foreach($JobEntity->tasks as $taskId)
        {
            $type = 'gzip';
            $Task = TaskLoader::get($type, $taskId);

            $parts[] = '';
            $parts[] = '#'.$type;
            $parts[] = $Task->generate();
            $parts[] = '';
        }

        return implode(PHP_EOL, $parts);
    }
}