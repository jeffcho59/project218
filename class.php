<?php

class MyClass {
    
    //clas property
    public $prop1 = "I'm a class property!"; 
    
    public static $count = 0;
    
    //constructor
    public function __construct() {
        echo 'The class " ', __CLASS__, ' " was initiated!<br />';
    }
    
    //deconstructor (to use, use unset)
    public function __destruct() {
      echo 'The class "', __CLASS__, '" was destroyed.<br />';
    }
    
    //converts to string by just going to getProperty
    public function __toString() {
        echo "Using the toString method: ";
        return $this->getProperty();
    }
    
    //class method set
    public function setProperty($newval) {
        $this->prop1 = $newval;
    }
    
    //class method get
    private function getProperty() {
        return $this->prop1 . "<br />";
    }
    
    public static function plusOne() {
        return "The count is " . ++self::$count . ".<br />";
    }
}

class MyOtherClass extends MyClass {
    
    public function __construct() {
        parent::__construct();
        echo "A new constructor in " . __CLASS__ . ".<br />";
    }
    
    public function newMethod() {
        echo "From a new method in " . __CLASS__ . ".<br />";
    }
    
    public function callProtected() {
        return $this->getProperty();
    }
}

do {
    echo MyClass::plusOne();
}

while(MyClass::$count<10);

?>