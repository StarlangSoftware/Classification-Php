<?php

namespace olcaytaner\Classification\Instance;

class InstanceComparator
{
    private int $attributeIndex;


    public function __construct(int $attributeIndex)
    {
        $this->attributeIndex = $attributeIndex;
    }

    /*
     * @return -1 if the attr value of the first instance is less than that of the second
     * 1 if it is greater and 0 if equal
     */
    public function compare(Instance $ins1, Instance $ins2): int
    {
        $att1 = $ins1->getAttribute($this->attributeIndex);
        $att2 = $ins2->getAttribute($this->attributeIndex);
        if ($att1 > $att2) {
            return 1;
        } elseif ($att1 < $att2) {
            return -1;
        }
        return 0; //equal
    }
}