<?php
namespace webbackuper\service;

use webbackuper\entity\AbstractEntity;

abstract class AbstractStorage
{
    const EXTENSION = 'json';

    abstract protected function _getFilePath ();

    private function _getFileName ($id) {
        return $this->_getFilePath() . $id . '.' . self::EXTENSION;
    }

    private function _store($file, $data) {
        if(!is_dir(dirname($file))) {
            mkdir(dirname($file), 0777, true);
        }

        $result = (bool)file_put_contents( $file, $data );

        if(!$result) {
            throw new \Exception('Have no permission to write into file "'.$file.'".');
        }

        chmod($file, 0777);

        return true;
    }

    public function save(AbstractEntity $entity) {
        $data = get_object_vars($entity);
        $data = json_encode($data);

        return self::_store( $this->_getFileName( $entity->id ), $data );
    }

    public function getData($id) {
        //TODO: validation
        if( !file_exists( $this->_getFileName($id) ) ) {
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
                $filename = $file->getBasename('.'.self::EXTENSION);
                $content = $this->getData($filename);

                $return[$filename] = $content;
            }
        }

        return $return;
    }

    public function getListObjects($entityName)
    {
        $list = $this->getList();
        ksort($list);

        foreach($list as $key => $value) {
            $list[$key] = new $entityName($value);
        }

        return $list;
    }

}