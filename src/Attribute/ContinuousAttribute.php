<?php

namespace olcaytaner\Classification\Attribute;

class ContinuousAttribute extends Attribute
{
    private float $value;

    /**
     * Constructor for a continuous attribute.
     *
     * @param float $value value of the attribute.
     */
    public function __construct(float $value)
    {
        $this->value = $value;
    }

    /**
     * Accessor method for value
     *
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     */
    public function setValue(float $value): void
    {
        $this->value = $value;
    }

    /**
     * Converts value to String.
     *
     * @return String representation of value.
     */
    public function __toString(): string
    {
        return sprintf("%.4f", $this->value);
    }

    /**
     * Returns 1 since it is already a continuous attribute.
     * @return int 1
     * TODO: bu javada neyi override ediyor henüz anlamorum.
     */
    public function continuousAttributeSize(): int
    {
        return 1;
    }

    /**
     * @return array An array list which contains only the value of this attribute.
     * TODO: bu da bir şeyi override ediyor ama ne ecebe
     */
    public function continuousAttributes(): array
    {
        $result = array();
        $result[] = $this->value; #I hate this syntax...
        return $result;
    }
}

