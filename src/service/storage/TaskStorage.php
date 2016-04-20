<?php
namespace webbackuper\service\storage;

class TaskStorage extends AbstractStorage
{
    const EXTENSION = 'json';
    const DIR_VAR = DIR_VAR_TASKS;

    public static function save($id, $content)
    {
        $content = json_encode($content, JSON_PRETTY_PRINT);
        return parent::save($id, $content);
    }

    public static function getById($id)
    {
        $data = parent::getById($id);
        $data = json_decode( $data, true );

        $entity = self::getNewEntity($data['type']);
        $entity->__construct($data);

        return $entity;
    }

    public static function getNewEntity($type)
    {
        $fullEntityName = str_replace('%type%', $type, TASK_NAMESPACE);
        return new $fullEntityName();
    }
}