<?php
// Define an interface
interface Animal {
    public function makeSound();
}

// Define an abstract class
abstract class Mammal {
    abstract public function move();
    
    public function breathe() {
        return "Breathing...";
    }
}

// Implement the interface and extend the abstract class
class Dog extends Mammal implements Animal {
    public function makeSound() {
        return "Bark";
    }

    public function move() {
        return "Running";
    }
}

// Usage
$dog = new Dog();
echo $dog->makeSound(); // Output: Bark
echo $dog->move();      // Output: Running
echo $dog->breathe();   // Output: Breathing...
?>