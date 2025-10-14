<?php

namespace Classification\Performance;

class ClassificationPerformance extends Performance
{
    private float $accuracy;

    public function __construct(float $accuracy, ?float $errorRate=null){
        if(is_null($errorRate)){
            parent::__construct(1-$accuracy);
        }else{
            parent::__construct($errorRate);
        }
        $this->accuracy = $accuracy;
    }
    public function getAccuracy():float{return $this->accuracy;}
}
