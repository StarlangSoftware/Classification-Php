<?php

namespace Classification\Instance;

class InstanceClassComparator
{
    /*
     * We don't need a Comparator interface in PHP
     */
    public function compare(Instance $o1,Instance $o2):int{
        return strcmp($o1->getClassLabel(), $o2->getClassLabel());
    }
}