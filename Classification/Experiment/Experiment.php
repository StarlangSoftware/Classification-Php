<?php

namespace Classification\Experiment;

use Classification\DataSet\DataSet;
use Classification\FeatureSelection\FeatureSubSet;
use Classification\Model\Model;
use Classification\Parameter\Parameter;

class Experiment
{
    private Model $model;
    private Parameter $parameter;
    private DataSet  $dataSet;
    public function __construct(Model $model, Parameter $parameter,DataSet $dataSet){
        $this->model = $model;
        $this->parameter = $parameter;
        $this->dataSet = new DataSet();
    }
    public function getModel(): Model{
        return $this->model;
    }
    public function getParameter(): Parameter{
        return $this->parameter;
    }
    public function getDataSet(): DataSet{
        return $this->dataSet;
    }
    public function featureSelectedExperiment(FeatureSubSet $featureSubSet):Experiment{
        return new Experiment($this->model,$this->parameter, $this->dataSet->getSubSetOfFeatures($featureSubSet));
    }
}