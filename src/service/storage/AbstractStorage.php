<?php
namespace webbackuper\service\storage;

use webbackuper\service\IO;

abstract class AbstractStorage
{
    const EXTENSION = null;
    const DIR_VAR = null;

    public static function getFileName ($id)
    {
        return $id .'.'. static::EXTENSION;
    }

    public static function save($id, $content)
    {
        $filename = self::getFileName($id);
        return IO::write(static::DIR_VAR, $filename, $content);

    }

    public static function getAll()
    {
        $return = array();

        if(!is_dir(static::DIR_VAR)) return $return;

        foreach (new \DirectoryIterator(static::DIR_VAR) as $file) {
            if ( $file->isFile() && static::EXTENSION == $file->getExtension() ) {
                $id = $file->getBasename('.'.static::EXTENSION);
                $content = static::getById($id);

                $return[$id] = $content;
            }
        }

        krsort($return);
        return $return;
    }

    public static function getById($id)
    {
        $filename = self::getFileName($id);
        return IO::read(static::DIR_VAR, $filename);
    }
}