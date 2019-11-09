<?php
class NightsWatch {
    public static $recruit = array();
    
    public function recruit($class) {
        if (is_subclass_of($class, "IFighter"))
            self::$recruit[] = get_class($class);
        else
            return;
    }
    public function fight() {
        foreach (self::$recruit as $r)
        {
            $r::fight();
        }
    }

}
?>