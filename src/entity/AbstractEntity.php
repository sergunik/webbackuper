<?php
namespace webbackuper\entity;

abstract class AbstractEntity
{
    public $id = null;

    /**
     * @param null $data
     */
    public function __construct($data = null) {
        if(is_null($data) || !is_array($data)) return;

        foreach( $data as $key => $val ) {
            if(property_exists($this, $key)) {
                $this->$key = $val;
            }
        }
    }
}