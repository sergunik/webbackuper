<?php
namespace Webbackuper\service;

use Webbackuper\entity\Job;
use Webbackuper\service\HostStorage;

class Generator
{
    const EXTENSION = 'sh';
    const PATTERN_COMMAND = "#RUN COMMANDS
ssh %user%@%host% '
%command%
'";

    /**
     * @var Job
     */
    private $job;

    /**
     * @var HostStorage
     */
    private $hostStorage;

    function __construct(HostStorage $hostStorage)
    {
        $this->hostStorage = $hostStorage;
    }

    public function generate(Job $job) {
        $this->job = $job;

        $script = [];
        $script[] = $this->generateShebang();
        $script[] = $this->generateCommand($this->job->before_host, $this->job->before_commands);
//        $script[] = PHP_EOL; //generate rsync command
        $script[] = $this->generateCommand($this->job->after_host, $this->job->after_commands);

        $this->store( implode( PHP_EOL.PHP_EOL, $script ) );
    }

    private function generateShebang() {
        return '#!/usr/bin/env sh';
    }

    private function generateCommand($host_id, $command) {
        $Host = $this->hostStorage->getHost($host_id);

        $pattern = self::PATTERN_COMMAND;
        $pattern = str_replace('%user%', $Host->user, $pattern);
        $pattern = str_replace('%host%', $Host->host, $pattern);
        $pattern = str_replace('%command%', $command, $pattern);

        return $pattern;
    }

    private function store($content) {
        $file = DIR_SHELL . $this->job->title . '.' . self::EXTENSION;

        $result = (bool)file_put_contents( $file, $content );

        if(!$result) {
            throw new \Exception('Have no permission to write into file "'.$file.'".');
        }
    }
}