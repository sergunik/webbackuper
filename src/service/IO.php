<?php
namespace webbackuper\service;
/**
 * User: Serhii Topolnytskyi
 * Date: 3/28/16
 */
class IO
{
    static function read($dir, $file)
    {
        $dir .= (substr($dir, -1) == '/' ? '' : '/');

        $filename = $dir . $file;

        //TODO: validation
        if( !file_exists( $filename ) ) {
            throw new \Exception('File "' . $filename . '" does not exist.');
        }

        //todo: exception if cant decode
        $data = file_get_contents( $filename );
        return json_decode( $data, true );
    }

    static function write($dir, $file, $data)
    {
        $dir .= (substr($dir, -1) == '/' ? '' : '/');

        if(!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }

        $filename = $dir . $file;

        $result = (bool)file_put_contents( $filename, $data );

        if(!$result) {
            throw new \Exception('Have no permission to write into file "'. $filename .'".');
        }

        chmod($filename, 0777);

        return true;
    }
}