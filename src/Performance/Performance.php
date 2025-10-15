<?php

namespace olcaytaner\Classification\Performance;

class Performance
{
    protected float $errorRate;

    public function __construct(float $errorRate)
    {
        $this->errorRate = $errorRate;
    }

    public function getErrorRate(): float
    {
        return $this->errorRate;
    }
}