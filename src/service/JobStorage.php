<?php
namespace Webbackuper\service;

use Webbackuper\entity\Job;

class JobStorage extends AbstractStorage
{
    protected function _getFilePath () {
        return DIR_CONFIG_JOBS;
    }

    public function get($id) {
        $data = self::getData($id);
        return new Job($data);
    }
}