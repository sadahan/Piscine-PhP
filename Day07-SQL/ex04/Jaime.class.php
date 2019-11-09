<?php

class Jaime extends Lannister {

    function sleepWith($class) {
        if (is_a($class, "Cersei"))
            print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
        else
            parent::sleepWith($class);
    }
}

?>