<?php
namespace Webbackuper\service;

use Webbackuper\entity\Job;

class Storage
{
    const EXTENSION = 'json';

    public function saveEntity(Job $Entity, $id = null) {
        $data = get_object_vars($Entity);

        return $this->saveJob($data, $id);
    }

    private function saveJob( $data, $id = null ) {
        if( is_null($id) ) {
            $id = $this->getLastAvailableId();
        }
        $file = DIR_CONFIG . $id . '.' . self::EXTENSION;

        $data_json = json_encode($data);

        $result = (bool)file_put_contents( $file, $data_json );

        if(!$result) {
            throw new \Exception('Have no permission to write into file "'.$file.'".');
        }

        return true;
    }

    public function getLastAvailableId() {
        return date("YmdHis");
    }

    public function getJob($id) {
        $file = DIR_CONFIG . $id . self::EXTENSION;
        if( !file_exists($file) ) {
            throw new \Exception('File "'.$file.'" does not exist.');
        }

        //todo: exception if cant decode
        return json_decode( file_get_contents( $file ), true );
    }

    public function getJobList() {
        $return = array();

        foreach (new \DirectoryIterator(DIR_CONFIG) as $file) {
            if ( $file->isFile() && self::EXTENSION == $file->getExtension() ) {
                $return[] = $file->getBasename('.'.self::EXTENSION);
            }
        }

        return $return;
    }
}