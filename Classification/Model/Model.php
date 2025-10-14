<?php

namespace Classification\Model;

use Classification\Attribute\DiscreteAttribute;
use Classification\Attribute\DiscreteIndexedAttribute;
use Classification\Instance\Instance;
use Classification\InstanceList\InstanceList;
use Classification\Parameter\Parameter;
use Classification\Performance\Performance;
use Classification\Performance\DetailedClassificationPerformance;
use Classification\Performance\ConfusionMatrix;
abstract class Model
{
    public abstract function predict(Instance $instance):string;
    public abstract function predictProbability(Instance $instance);// TODO: this returns HashMap<String, Double>

    public abstract function saveTxt(string $fileName):void;

    public abstract function train(InstanceList $trainSet, Parameter $parameters):void;

    public abstract function loadModel(string $fileName):void;

    public function discreteCheck(Instance $instance):bool{
        for($i=0; $i<$instance->attributeSize(); $i++){
            if($instance->getAttribute($i) instanceOf DiscreteAttribute && !($instance->getAttribute($i) instanceOf DiscreteIndexedAttribute)){
                return false;
            }
        }
        return true;
    }

    public function singleRun(Parameter $parameter, InstanceList $trainSet, InstanceList $testSet):Performance
    {
        train($trainSet, $parameter);
        return test($testSet);
    }
    public function test(InstanceList $testSet):Performance{
        $classLabels = $testSet->getUnionOfPossibleClassLabels(); //TODO: bunu su an yapamiycam valla
        $confusion = new ConfusionMatrix($classLabels);
        for($i=0;$i<$testSet->size();$i++){
            $instance = $testSet->get($i);
            $confusion->classify($instance->getClassLabel(),predict($instance));
        }
        return new DetailedClassificationPerformance($confusion);
    }
}