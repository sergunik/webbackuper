<?php
namespace Webbackuper\service;

use Webbackuper\entity\Job;

class Generator
{
    const EXTENSION = 'sh';

    /**
     * @var Job
     */
    private $job;

    public function generate(Job $job) {
        $this->job = $job;

        $script = [];
        $script[] = $this->generateCommand($this->job->before_host, $this->job->before_commands);
        $script[] = PHP_EOL; //generate rsync command
        $script[] = $this->generateCommand($this->job->after_host, $this->job->after_commands);

        $this->store( implode( PHP_EOL, $script ) );
    }

    private function generateCommand($host, $command) {
$pattern = "#RUN COMMANDS
ssh %host% '
%command%
'";

        $pattern = str_replace('%host%', $host, $pattern);
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