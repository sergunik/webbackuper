<?php
namespace webbackuper\service\storage;

class TaskStorage extends AbstractStorage
{
    //ToDo: make all static methods
    protected function _getFilePath () {
        return DIR_VAR_TASKS;
    }

    public function getNewEntity($type)
    {
        //ToDo: use constant
        $fullEntityName = 'webbackuper\\task\\'.$type.'\\'.$type.'Entity';
        return new $fullEntityName();
    }

    public function getById($id)
    {
        $data = parent::getById($id);

        $entity = $this->getNewEntity($data['type']);
        $entity->__construct($data);

        return $entity;
    }
}