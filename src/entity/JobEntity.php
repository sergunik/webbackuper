<?php
namespace webbackuper\entity;

class JobEntity extends AbstractEntity
{
    public $name;
    public $tasks = array();
}