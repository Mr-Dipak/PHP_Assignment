<?php
// Interface
interface Animal {
    public function makeSound();
}

// Abstract class
abstract class Mammal implements Animal {
    protected $name;

    // Constructor
    public function __construct($name) {
        $this->name = $name;
    }

    // Abstract method
    abstract public function getName();
    
    // Destructor
    public function __destruct() {
        echo "Destroying " . $this->name . "\n";
    }
}

// Class that inherits from abstract class
class Dog extends Mammal {
    private $breed;

    // Constructor with parameter passing to base class constructor
    public function __construct($name, $breed) {
        parent::__construct($name);
        $this->breed = $breed;
    }

    // Implementing abstract method
    public function getName() {
        return $this->name;
    }

    // Implementing interface method
    public function makeSound() {
        return "Bark";
    }

    public function getBreed() {
        return $this->breed;
    }
}

// Creating an object of Dog class
$dog = new Dog("Buddy", "Golden Retriever");

echo "Name: " . $dog->getName() . "\n";
echo "Breed: " . $dog->getBreed() . "\n";
echo "Sound: " . $dog->makeSound() . "\n";

// Destructor will be called automatically at the end of script
?>