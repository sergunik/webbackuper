<?php
namespace webbackuper\service;

use webbackuper\entity\Job;
use webbackuper\service\IO;
use webbackuper\entity\AbstractEntity;
use webbackuper\service\StorageInterface;

class JobStorage implements StorageInterface
{
    const EXTENSION = 'json';

    protected function _getFilePath () {
        return DIR_CONFIG_JOBS;
    }

    public function save(AbstractEntity $entity)
    {
        $file = $entity->id . self::EXTENSION;
        $data = (array) json_encode($entity, JSON_PRETTY_PRINT);

        IO::write($this->_getFilePath(), $file, $data);
    }

    public function getById($id)
    {
        $file = $id . self::EXTENSION;
        $data = IO::read($this->_getFilePath(), $file);

        return new Job($data);
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getList()
    {
        // TODO: Implement getList() method.
    }

//    protected function _getFilePath () {
//        return DIR_CONFIG_JOBS;
//    }
//
//    public function get($id) {
//        $data = self::getData($id);
//        return new Job($data);
//    }
}