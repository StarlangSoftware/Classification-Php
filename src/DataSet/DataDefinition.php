<?php

namespace olcaytaner\Classification\DataSet;

class DataDefinition
{
    private array $attributeTypes;
    private array $attributeValueList;

    public function __construct(?array $attributeTypes, ?array $attributeValueList)
    {
        if ($attributeTypes) {
            $this->attributeTypes = $attributeTypes;
        }
        if ($attributeValueList) {
            $this->attributeValueList = $attributeValueList;
        } else {
            $this->attributeTypes = array();
        }
    }
}