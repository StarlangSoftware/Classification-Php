<?php
namespace Classification\Attribute;
enum AttributeType
{
    case CONTINUOUS;
    /**
     * Discrete Attribute
     */
    case DISCRETE;
    /**
     * Binary Attribute
     */
    case BINARY;
    /**
     * Discrete Indexed Attribute is used to store the indices.
     */
    case DISCRETE_INDEXED;
}