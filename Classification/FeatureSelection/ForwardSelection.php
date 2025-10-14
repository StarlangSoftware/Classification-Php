<?php

namespace Classification\FeatureSelection;

class ForwardSelection extends SubSetSelection
{
    public function __construct(){
        parent::__construct(new FeatureSubSet([]));
    }
    protected function operator(FeatureSubSet $current, int $numberOfFeatures): array
    {
        $result = array();
        $this->forward($result, $current, $numberOfFeatures);
        return $result;
    }
}