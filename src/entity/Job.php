<?php
namespace Webbackuper\entity;

class Job extends AbstractEntity
{
    public $title;
    public $before_host;
    public $before_commands;
    public $from_host;
    public $from_path;
    public $to_host;
    public $to_path;
    public $after_host;
    public $after_commands;
}