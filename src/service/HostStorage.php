<?php
namespace webbackuper\service;

use webbackuper\entity\Host;

class HostStorage extends AbstractStorage
{
    protected function _getFilePath () {
        return DIR_CONFIG_HOSTS;
    }

    public function saveHost(Host $Host) {
        return self::_saveEntity($Host);
    }

    public function getHost($id) {
        $data = self::_getEntity($id);
        return new Host($data);
    }
}