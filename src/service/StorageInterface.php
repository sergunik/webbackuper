<?php
namespace webbackuper\service;

use webbackuper\entity\AbstractEntity;

/**
 * User: Serhii Topolnytskyi
 * Date: 3/28/16
 */
interface StorageInterface
{
    public function getById($id);

    public function getAll();

    public function getList();

    public function save(AbstractEntity $entity);
}