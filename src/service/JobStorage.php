<?php
namespace Webbackuper\service;

use Webbackuper\entity\Job;

class JobStorage extends AbstractStorage
{
    protected function _getFilePath () {
        return DIR_CONFIG_JOBS;
    }

    public function saveJob(Job $Job) {
        return self::_saveEntity($Job);
    }

    public function getJob($id) {
        $data = self::_getEntity($id);
        return new Job($data);
    }
}