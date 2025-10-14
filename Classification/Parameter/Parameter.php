<?php

namespace Classification\Parameter;

class Parameter
{
    private int $seed;

    public function __construct(int $seed){
        $this->seed = $seed;
    }
    public function getSeed(): int{
        return $this->seed;
    }
}