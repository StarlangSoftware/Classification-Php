<?php

namespace olcaytaner\Classification\FeatureSelection;

class FloatingSelection extends SubSetSelection
{
    public function __construct()
    {
        parent::__construct(new FeatureSubSet([]));
    }

    public function operator(FeatureSubSet $current, int $numberOfFeatures): array
    {
        $result = array();
        $this->forward($result, $current, $numberOfFeatures);
        $this->backward($result, $current);
        return $result;
    }
}