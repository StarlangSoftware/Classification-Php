<?php

namespace Classification\FeatureSelection;
use Classification\Experiment\Experiment;
use Classification\Experiment\MultipleRun;

require "FeatureSubSet.php";

abstract class  SubSetSelection
{
    protected FeatureSubSet $initialSubSet;

    abstract protected function operator(FeatureSubSet $current,int $numberOfFeatures):array;

    public function __construct(FeatureSubSet $initialSubSet){
        $this->initialSubSet = $initialSubSet;
    }

    protected function forward(array &$currentSubSetList, FeatureSubSet &$current, int $numberOfFeatures):void{
        for($i=0;$i<$numberOfFeatures;$i++){
            if($current->contains($i)){
                $candidate = clone $current;
                $candidate->add($i);
                $currentSubSetList[] = $candidate;
            }
        }
    }
    protected function backward(array &$currentSubSetList, FeatureSubSet $current):void{
        for($i=0;$i<$current->size();$i++){
            $candidate = clone $current;
            $candidate->remove($i);
            $currentSubSetList[] = $candidate;
        }
    }

    public function execute(MultipleRun $multipleRun, Experiment $experiment):FeatureSubSet{
        //TODO: Allah ya rabbi
    }
}
