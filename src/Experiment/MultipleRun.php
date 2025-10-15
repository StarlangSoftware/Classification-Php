<?php

namespace olcaytaner\Classification\Experiment;

use olcaytaner\Classification\Performance\ExperimentPerformance;

abstract class MultipleRun //TODO: aslinda interface bu
{
    abstract function execute(Experiment $experiment): ExperimentPerformance;
}