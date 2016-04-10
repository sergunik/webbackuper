<?php
namespace webbackuper\entity;

class Job extends AbstractEntity
{
    public $name;
    public $tasks = array();
}