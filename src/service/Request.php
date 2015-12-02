<?php
namespace Webbackuper\service;

use Webbackuper\entity\Job;

class Request
{
    private $_post;
    private $_get;

    function __construct()
    {
        $this->_get = $_GET;
        $this->_post = $_POST;
    }

    public function processing(Job &$Entity) {
        foreach( get_object_vars($Entity) as $field=>$null ) {
            if( !isset($this->_post[$field]) ) {
                throw new \Exception('Field "'.$field.'" not found.');
            }

            $value = trim($this->_post[$field]);

            if( '' == $value ) {
                throw new \Exception('Field "'.$field.'" is empty.');
            }

            $Entity->$field = $value;
        }

    }
}