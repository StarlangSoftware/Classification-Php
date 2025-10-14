<?php

namespace Classification\Instance;

require __DIR__ . "/../../vendor/autoload.php";

use Classification\Attribute\Attribute;
use Classification\Attribute\ContinuousAttribute;
use Classification\Attribute\DiscreteAttribute;
use Classification\FeatureSelection\FeatureSubSet;
use Dom\NodeList;
use InvalidArgumentException;

class Instance
{
    private string $classLabel;
    private array $attributes;

    /**
     * Constructor for a single instance. Given the attributes and class label, it generates a new instance.
     * attributes is not necessary; defaults to empty array when not given.
     * @param string $classLabel Class label of the instance.
     * @param array $attributes Attributes of the instance.
     */
    public function __construct(string $classLabel, array $attributes = array()){
        $this->classLabel = $classLabel;
        $this->attributes = $attributes ?? array();
    }

    /**
     * adds an attribute given a value.
     * creates discrete att. for a string;
     * cont. att. for a double and simply adds the att if given att.
     * @param $value
     * @return void
     */
    public function addAttribute($value): void
    {
        if(is_string($value)){
            $addendum = new DiscreteAttribute($value);
        }
        elseif(is_float($value)){
            $addendum = new ContinuousAttribute($value);
        }
        elseif ($value instanceof Attribute){
            $addendum = $value;
        }
        else{
            throw new InvalidArgumentException("addAttribute function takes a string, float, or Attribute instance as argument!.");
        }
        $this->attributes[] = $addendum;
    }

    /**
     * Adds an array of attributes.
     * Java method specifies cont. att.s but meh
     * @param array $vector a vector is basically an array in PHP
     * @return void
     */
    public function addVectorAttribute(array $vector ): void
    {
        foreach ($vector as $attribute){
            $this->addAttribute($attribute);
        }

    }
    public function removeAttribute(int $index): void{
        array_splice($this->attributes, $index, 1);
        //TODO: I am not 100% sure with this.
    }

    /**
     * removes all the att.s from the list by assigning the list to an empty array
     * @return void
     */
    public function removeAllAttributes(): void{
        $this->attributes = array();
    }

    /**
     * Accessor for a single attribute.
     *
     * @param int $index
     * @return Attribute
     */
    public function getAttribute(int $index): Attribute
    {
        return $this->attributes[$index];
    }

    /**
     * Returns the number of attributes in the attributes list.
     *
     * @return Number of attributes in the attributes list.
     */
    public function attributeSize(): int
    {
        return $this->attributeSize();
    }
    /**
     * Returns the number of continuous and discrete indexed attributes in the attributes list.
     *
     * @return Number of continuous and discrete indexed attributes in the attributes list.
     */
    public function continuousAttributeSize(): int{
        $size = 0;
        foreach ($this->attributes as $attribute){
            $size += $attribute->continuousAttributeSize();
        }
        return $size;
    }

    /**
     * The continuousAttributes method creates a new array result, and it adds the continuous attributes of the
     * attributes list, and also it adds 1 for the discrete indexed attributes
     * TODO: sanki eklemiyor yahu o bir'i...
     *
     * @return array $result that has continuous and discrete indexed attributes.
     */
    public function continuousAttributes(): array
    {
        $result = array();
        foreach ($this->attributes as $attribute){
            foreach ($attribute->continuousAttributes() as $continuousAttribute){
                $result[] = $continuousAttribute;
            }
        }
        return $result;
    }
    /**
     * Accessor for the class label.
     *
     * @return string $classLabel of the instance.
     */
    public function getClassLabel(): string{return $this->classLabel;}

    /**
     * Converts instance to a {@link String}.
     *
     * @return string A string of attributes separated with comma character.
     */
    public function __toString(): string
    {
        $result = "";
        foreach ($this->attributes as $attribute){
            $result .= $attribute->toString();
        }
        $result .= $this->classLabel;
        return $result;
    }

    /**
     * The getSubSetOfFeatures method takes a {@link FeatureSubSet} as an input. First it creates a result {@link Instance}
     * with the class label, and adds the attributes of the given featureSubSet to it.
     *
     * @param $featureSubSet {@link FeatureSubSet} an {@link ArrayList} of indices.
     * @return Instance $result.
     */
    public function getSubSetOfFeatures(FeatureSubSet $featureSubSet): Instance
    {
        $result = new Instance($this->classLabel);
        for ($i=0; $i<$featureSubSet->size(); $i++){
            $result->addAttribute($featureSubSet->get($i));
            //TODO: in Java we have "result.addAttribute(attributes.get(featureSubSet.get(i)));"
            //I don't really understand why...
        }
        return $result;
    }

    /**
     * The toVector method returns a {@link Vector} of continuous attributes and discrete indexed attributes.
     * TODO: this is not really so meaningful in PHP...
     * @return array of continuous attributes and discrete indexed attributes.
     */
    public function toVector(): array
    {
        $result = array();
        foreach ($this->attributes as $attribute){
            foreach ($attribute->continuousAttributes() as $continuousAttribute){
                $result[] = $continuousAttribute;
            }

        }
        return $result;
    }
    public function getAttributeSize():int{return count($this->attributes);}

    public function toNodeList(): NodeList{
        return new NodeList($this->continuousAttributes());
    }
}
