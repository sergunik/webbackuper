<?php
namespace Webbackuper\service;

class TaskStorage extends AbstractStorage
{
    private $_jobId;

    public function __construct($jobId)
    {
        $this->_jobId = $jobId;
    }

    protected function _getFilePath ()
    {
        return DIR_CONFIG_TASKS.$this->_jobId.'/';
    }
}