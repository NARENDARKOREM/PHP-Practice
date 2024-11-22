<?php
class myIterator implements Iterator {
    public $items = [];
    public $pointer = 0;

    public function __construct($items) {
        $this->items = array_values($items);
    }

    public function current() {
        return $this->items[$this->pointer];
    }

    public function key() {
        return $this->pointer; // Add return statement
    }

    public function next() {
        $this->pointer++;   
    }

    public function rewind() {
        $this->pointer = 0;
    }

    public function valid() {
        return $this->pointer < count($this->items);
    }
}

function printIterable(iterable $myIterator) {
    foreach ($myIterator as $item) {
        echo $item . " "; // Print each item instead of returning
    }
}

$iterator = new myIterator([1, 2, 3, 4, 5, 6, 66, 77, 44]);
printIterable($iterator);
?>
