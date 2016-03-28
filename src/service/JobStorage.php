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

    protected function _getFilename ($id)
    {
        return $id .'.'. self::EXTENSION;
    }

    public function save(AbstractEntity $entity)
    {
        $file = $this->_getFilename($entity->id);
        $data = (array) json_encode($entity, JSON_PRETTY_PRINT);

        IO::write($this->_getFilePath(), $file, $data);
    }

    public function getById($id)
    {
        $file = $this->_getFilename($id);
        $data = IO::read($this->_getFilePath(), $file);

        return new Job($data);
    }

    public function getAll()
    {
        $return = [];

        foreach (new \DirectoryIterator($this->_getFilePath()) as $file) {
            if ( $file->isFile() && self::EXTENSION == $file->getExtension() ) {
                $filename = $file->getBasename('.'.self::EXTENSION);
                $content = $this->getById($filename);

                $return[$filename] = $content;
            }
        }

        return $return;
    }
}