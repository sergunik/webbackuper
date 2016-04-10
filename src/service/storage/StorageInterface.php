<?php
namespace webbackuper\service\storage;

use webbackuper\entity\AbstractEntity;

interface StorageInterface
{
    public function getById($id);

    public function getAll();

    public function save(AbstractEntity $entity);
}