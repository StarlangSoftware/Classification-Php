<?php

namespace olcaytaner\Classification\FeatureSelection;

class BackwardSelection extends SubSetSelection
{
    public function __construct(int $numberOfFeatures)
    {
        parent::__construct(new FeatureSubSet($numberOfFeatures));
    }

    protected function operator(FeatureSubSet $current, int $numberOfFeatures): array
    {
        $result = array();
        $this->backward($result, $current);
        return $result;
    }
}