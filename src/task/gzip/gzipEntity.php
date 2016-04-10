<?php
namespace webbackuper\task\gzip;

use webbackuper\entity\AbstractTaskEntity;

class gzipEntity extends AbstractTaskEntity
{
    public $name = 'GZIP task';
    public $type = 'gzip';
    public $fileToArchiving;
    public $fileResult;
}