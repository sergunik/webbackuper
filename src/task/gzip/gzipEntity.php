<?php
namespace webbackuper\task\gzip;

use webbackuper\entity\AbstractEntity;

class gzipEntity extends AbstractEntity
{
    public $name = 'GZIP task';
    public $type = 'gzip';
    public $fileToArchiving;
    public $fileResult;
}