<?php

namespace Classification\Attribute;
require "Attribute.php";

#TODO: son iki metot yine bir şeyleri override ediyor ama acaba nedur
class DiscreteAttribute extends Attribute{
    private String $value;
    /*
     * TODO: bu aslında final yazılmış fakat php izin vermor
     */

    /**
     * Constructor for a discrete attribute.
     *
     * @param string $value Value of the attribute.
     */
    public function __construct(string $value){$this->value=$value;}

    /**
     * Accessor method for value.
     *
     * @return string $value
     */
    public function getValue(): string {return $this->value;}


    public function continuousAttributeSize():int{return 0;}

    public function continuousAttributes():array {return array();}
}
