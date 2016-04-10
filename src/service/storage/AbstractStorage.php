<?php
namespace webbackuper\service\storage;

use webbackuper\entity\AbstractEntity;
use webbackuper\service\IO;

abstract class AbstractStorage implements StorageInterface
{
    const EXTENSION = 'json';

    abstract protected function _getFilePath ();

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
        return IO::read($this->_getFilePath(), $file);
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

        krsort($return);
        return $return;
    }
}