<?php

namespace Classification\Performance;
require "Classification/Performance/ConfusionMatrix.php";
class DetailedClassificationPerformance extends ClassificationPerformance
{
    private ConfusionMatrix $confusionMatrix;

    public function __construct(ConfusionMatrix $confusionMatrix){
        parent::__construct($confusionMatrix->getAccuracy());
        $this->confusionMatrix = $confusionMatrix;
    }
    public function getConfusionMatrix(): ConfusionMatrix
    {
        return $this->confusionMatrix;
    }
}