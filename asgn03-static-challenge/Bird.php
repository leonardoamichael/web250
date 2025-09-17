<?php

class Bird {
    var $habitat;
    var $food;
    var $nesting = "tree";
    var $conservation;
    var $song = "chirp";
    var $flying = "yes";

    function can_fly() {
        return ($this->flying == "yes") ? "can fly" : "is stuck on the ground";
    }

    public static $instance_count = 0;
    public static $egg_num = 0;

    // increment the counter whenever an instance is made
    public function __construct() {
        static::$instance_count++;   // <- late static binding so subclasses count too
    }

    // return an instance of the *called* class
    public static function create() {
        return new static();         // <- not new self()
    }

}

class YellowBelliedFlyCatcher extends Bird {
    var $name = "yellow-bellied flycatcher";
    var $diet = "mostly insects.";
    var $song = "flat chilk";
    public static $egg_num = "3-4, sometimes 5.";
}

class Kiwi extends Bird {
    var $name = "kiwi";
    var $diet = "omnivorous";
    var $flying = "no";
}
