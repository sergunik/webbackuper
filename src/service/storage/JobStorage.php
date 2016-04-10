<?php
namespace webbackuper\service\storage;

use webbackuper\entity\Job;

class JobStorage extends AbstractStorage
{
    protected function _getFilePath () {
        return DIR_CONFIG_JOBS;
    }

    public function getById($id)
    {
        $data = parent::getById($id);

        return new Job($data);
    }
}