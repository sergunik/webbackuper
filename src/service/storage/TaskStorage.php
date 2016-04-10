<?php
namespace webbackuper\service\storage;

use webbackuper\service\TaskLoader;

class TaskStorage extends AbstractStorage
{
    protected function _getFilePath () {
        return DIR_VAR_TASKS;
    }

    public function getById($id)
    {
        $data = parent::getById($id);

        $Task = TaskLoader::get($data['type']);
        return $Task->getEntity($data);
    }
}