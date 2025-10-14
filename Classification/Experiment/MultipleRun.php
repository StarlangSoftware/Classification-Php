<?php

namespace Classification\Experiment;

use Classification\Performance\ExperimentPerformance;

//require "Classification/Performance/ExperimentPerformance.php";

abstract class MultipleRun //TODO: aslinda interface bu
{
    abstract function execute(Experiment $experiment):ExperimentPerformance;
}