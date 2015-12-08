<?php
namespace Webbackuper\service;

use webbackuper\entity\AbstractEntity;

abstract class AbstractStorage
{
    const EXTENSION = 'json';

    abstract protected function _getFilePath ();

    protected function _getFileName ($id) {
        return $this->_getFilePath() . $id . '.' . self::EXTENSION;
    }

    protected function _store($file, $data) {
        $result = (bool)file_put_contents( $file, $data );

        if(!$result) {
            throw new \Exception('Have no permission to write into file "'.$file.'".');
        }

        chmod($file, 0777);

        return true;
    }

    protected function _saveEntity(AbstractEntity $entity) {
        $data = get_object_vars($entity);
        $data = json_encode($data);

        return self::_store( $this->_getFileName( $entity->title ), $data );
    }

    protected function _getEntity($id) {
        if( !file_exists( $this->_getFileName($id) ) ) {
            //todo: create my own Exception and handle it
            throw new \Exception('File "' . $this->_getFileName($id) . '" does not exist.');
        }

        //todo: exception if cant decode
        $data = file_get_contents( $this->_getFileName($id) );
        return json_decode( $data, true );
    }

    public function getList() {
        $return = [];

        foreach (new \DirectoryIterator($this->_getFilePath()) as $file) {
            if ( $file->isFile() && self::EXTENSION == $file->getExtension() ) {
                $return[] = $file->getBasename('.'.self::EXTENSION);
            }
        }

        return $return;
    }

}