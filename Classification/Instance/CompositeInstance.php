<?php

namespace Classification\Instance;
require "Instance.php";

class CompositeInstance extends Instance
{
    private array $possibleClassLabels;

    /**
     * Constructor of {@link CompositeInstance} class which takes a class label and attributes as inputs. It generates
     * a new composite instance with given class label and attributes.
     * As with the Instance class, attributes array is not necessary
     * @param string| null $classLabel Class label of the composite instance.
     * @param array $attributes Attributes of the composite instance.
     * @param array|null $possibleClassLabels Possible labels of the composite instance.
     */
    public function __construct(?string $classLabel = null, array $attributes = array(), ?array $possibleClassLabels = array()){
        if($classLabel !== null){ //given classLabel, use that.
            parent::__construct($classLabel, $attributes);
        }
    else if($attributes !== []){
            parent::__construct($possibleClassLabels[0]);
            for ($i=1; $i<count($possibleClassLabels); $i++){
                $this->possibleClassLabels[] = $possibleClassLabels[$i];
            }
        }
    }

    public function getPossibleClassLabels(): array{
        return $this->possibleClassLabels;
    }

    public function setPossibleClassLabels(array $possibleClassLabels):void{
        $this->possibleClassLabels = $possibleClassLabels;
    }

    public function __toString():string{
        $result = parent::__toString();
        foreach ($this->possibleClassLabels as $possibleClassLabel){
            $result .= $possibleClassLabel;
        }
        return $result;
    }
}
