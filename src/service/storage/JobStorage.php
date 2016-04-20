<?php
namespace webbackuper\service\storage;

use webbackuper\entity\JobEntity;

class JobStorage extends AbstractStorage
{
    const EXTENSION = 'json';
    const DIR_VAR = DIR_VAR_JOBS;

    public static function save($id, $content)
    {
        $content = json_encode($content, JSON_PRETTY_PRINT);
        return parent::save($id, $content);
    }

    public static function getById($id)
    {
        $data = parent::getById($id);
        $data = json_decode( $data, true );

        return new JobEntity($data);
    }

    public static function getNewEntity()
    {
        return new JobEntity();
    }
}