<?php
namespace Webbackuper\task\gzip;

use Webbackuper\entity\AbstractTask;

class gzipEntity extends AbstractTask
{
    public $name = 'GZIP task';
    public $type = 'gzip';
    public $fileToArchiving;
    public $fileResult;
}