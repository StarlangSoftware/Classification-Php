<?php

namespace olcaytaner\Classification\Attribute;

class BinaryAttribute extends DiscreteAttribute
{
    /**
     * Constructor for a binary discrete attribute. The attribute can take only two values "True" or "False".
     *
     * @param bool $value Value of the attribute. Can be true or false.
     */
    public function __construct(bool $value)
    {
        parent::__construct($value);
    }
    #I trust in the auto typecast.
}
