<?php

class UnholyFactory {
    private static $absorbed = array();

    public function absorb($class) {
        if (!is_a($class, "Fighter"))
            print("(Factory can't absorb this, it's not a fighter)\n");
        elseif (self::$absorbed && in_array($class, self::$absorbed))
            print("(Factory already absorbed a fighter of type ".lcfirst(get_class($class)).")\n");
        else
        {
            self::$absorbed[] = $class;
            print("(Factory absorbed a fighter of type ".lcfirst(get_class($class)).")\n");
        }
    }

    public function fabricate($fighter) {  
        $class = ucfirst(preg_replace("/\s/", "", $fighter));
        if (!in_array(new $class(), self::$absorbed))
            print("(Factory hasn't absorbed any fighter of type ".$fighter.")\n");
        else
        {
            print("(Factory fabricates a fighter of type ".$fighter.")\n");
            return (new $class);
        }
    }
}

?>
