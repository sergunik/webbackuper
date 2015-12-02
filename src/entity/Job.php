<?php
namespace Webbackuper\entity;

class Job
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

    public function __construct($data = null) {
        if(is_null($data) || !is_array($data)) return;

        foreach( $data as $key => $val ) {
            if(property_exists(__CLASS__, $key)) {
                $this->$key = $val;
            }
        }
    }
}