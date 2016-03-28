<?php
namespace webbackuper\task\gzip;

use webbackuper\entity\AbstractTask;

class gzipEntity extends AbstractTask
{
    public $name = 'GZIP task';
    public $type = 'gzip';
    public $fileToArchiving;
    public $fileResult;
}