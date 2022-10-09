<?php 
class niveau{
    private $progress,$Name;
    function __construct($nm)
    {
        $this->Name=$nm;
    }
    function getProgress(){
        return $this->progress;
    }
    function setProgress($new_progress){
        $this->progress=$new_progress;
    }
}