<?php

namespace olcaytaner\Classification\Attribute;

class DiscreteIndexedAttribute extends DiscreteAttribute
{
    private int $index;
    private int $maxIndex;

    /**
     * Constructor for a discrete attribute.
     *
     * @param string $value Value of the attribute.
     * @param int $index Index of the attribute.
     * @param int $maxIndex Maximum index of the attribute.
     */
    public function __construct(string $value, int $index, int $maxIndex)
    {
        parent::__construct($value);
        $this->index = $index;
        $this->maxIndex = $maxIndex;
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getMaxIndex(): int
    {
        return $this->maxIndex;
    }

    public function continuousAttributeSize(): int
    {
        return $this->maxIndex;
    }

    public function continuousAttributes(): array
    {
        $result = array();
        for ($i = 0; $i < $this->maxIndex; $i++) {
            if ($i != $this->index)
                $result[] = 0.0;
            else
                $result[] = 1.0;
        }
        return $result;
    }
}
