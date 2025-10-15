<?php

namespace olcaytaner\Classification\Experiment;

use olcaytaner\Classification\DataSet\DataSet;
use olcaytaner\Classification\FeatureSelection\FeatureSubSet;
use olcaytaner\Classification\Model\Model;
use olcaytaner\Classification\Parameter\Parameter;

class Experiment
{
    private Model $model;
    private Parameter $parameter;
    private DataSet $dataSet;

    public function __construct(Model $model, Parameter $parameter, DataSet $dataSet)
    {
        $this->model = $model;
        $this->parameter = $parameter;
        $this->dataSet = new DataSet();
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getParameter(): Parameter
    {
        return $this->parameter;
    }

    public function getDataSet(): DataSet
    {
        return $this->dataSet;
    }

    public function featureSelectedExperiment(FeatureSubSet $featureSubSet): Experiment
    {
        return new Experiment($this->model, $this->parameter, $this->dataSet->getSubSetOfFeatures($featureSubSet));
    }
}