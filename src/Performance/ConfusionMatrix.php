<?php

namespace olcaytaner\Classification\Performance;

class ConfusionMatrix
{
    /**
     * @var array<string, CounterHashMap<string>>
     */
    private array $matrix;
    private array $classLabels;

    public function __construct(array $classLabels)
    {
        $this->classLabels = $classLabels;
        $this->matrix = array();
    }

    public function trace(): float
    {
        $result = 0;
    }

    public function getAccuracy(): float
    {
        return $this->trace() / $this->sumOfelements();
    }

    public function classify(string $actualClass, string $predictedClass): void
    {
        if (array_key_exists($actualClass, $this->matrix)) {
            $counterHashMap = $this->matrix[$actualClass];
        } else {
            //"TODO: I will do this later... when I understand what's going on with these matrices...";
            $a = 1;
        }
    }
}
