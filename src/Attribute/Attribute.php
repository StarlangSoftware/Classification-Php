<?php

namespace olcaytaner\Classification\Attribute;

abstract class Attribute
{
    public abstract function continuousAttributes();

    public abstract function continuousAttributeSize();
}