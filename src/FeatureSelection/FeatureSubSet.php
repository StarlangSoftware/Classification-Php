<?php

namespace olcaytaner\Classification\FeatureSelection;

use InvalidArgumentException;

class FeatureSubSet
{
    private array $indexList = array();

    /**
     * A constructor that sets the indexList if given an array as input
     * If given an int as number of features; it initializes indexList with these numbers
     *
     * @param $value int|array or int ArrayList consists of integer indices.y
     * TODO: bu dokumantasyon daha iyi yapilabilir
     */
    public function __construct(int|array $value)
    {
        if (is_array($value)) {
            $this->indexList = $value;
        } else if (is_integer($value)) {
            $this->indexList = array();
            for ($i = 0; $i < $value; $i++) {
                $this->indexList[] = $i;
            }
        } else {
            throw new InvalidArgumentException("You can construct a featureSubSet with an int or an array!.");
        }
    }
    //TODO: Java'da bir de argumansiz constructor var ama gerek yok sanki -insallah-

    /**
     *
     * @return FeatureSubSet A clone of this FeatureSubSet.
     * TODO: doc of this func in Java is incorrect!
     */
    public function clone(): FeatureSubSet
    {
        //TODO: this is *not* a deep copy, but it should suffice
        $newIndexList = [...$this->indexList];
        return new FeatureSubSet($newIndexList);
    }

    public function size(): int
    {
        return count($this->indexList);
    }

    /**
     * The get method returns the item of indexList at given index.
     *
     * @param $index int index of the indexList to be accessed.
     * @return int The item of indexList at given index.
     */
    public function get(int $index): int
    {
        return $this->indexList[$index];
    }

    /**
     * The contains method returns True, if indexList contains given input number and False otherwise.
     *
     * @param $featureNo int Feature number that will be checked.
     * @return bool true, if indexList contains given input number.
     */
    public function contains(int $featureNo): bool
    {
        return in_array($featureNo, $this->indexList);
    }

    public function add(int $featureNo): void
    {
        $this->indexList[] = $featureNo;
    }

    /**
     * The remove method removes the item of indexList at the given index.
     *
     * @param $index int Index of the item that will be removed.
     */
    public function remove(int $index): void
    {
        array_splice($this->indexList, $index, 1);
    }

}
