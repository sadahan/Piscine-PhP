<?php

class Lannister {

    function sleepWith($class) {
        if (get_parent_class($class) != "Lannister")
            print ("Let's do this." . PHP_EOL);
        else
            print("Not even if I'm drunk !" . PHP_EOL);
    }
}

?>