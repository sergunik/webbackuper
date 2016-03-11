<?php
namespace Webbackuper\service;

use webbackuper\entity\AbstractEntity;

class Request
{
    private $_post;
    private $_get;

    function __construct()
    {
        $this->_get = $_GET;
        $this->_post = $_POST;
    }

    public function processing(AbstractEntity &$Entity) {
        foreach( get_object_vars($Entity) as $field=>$null ) {
            if( isset($this->_post[$field]) ) {
                $Entity->$field = trim($this->_post[$field]);
            }
        }
    }
}