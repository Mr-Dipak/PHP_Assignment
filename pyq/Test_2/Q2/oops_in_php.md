# Object-Oriented Programming in PHP

## Introduction
Object-Oriented Programming (OOP) is a programming paradigm that uses objects and classes to structure code in a more modular and reusable way.

## Key Concepts

### Classes and Objects
- **Class**: A blueprint for creating objects. It defines properties and methods.
- **Object**: An instance of a class.

### Properties and Methods
- **Properties**: Variables that belong to a class.
- **Methods**: Functions that belong to a class.

### Inheritance
- Allows a class to inherit properties and methods from another class using the `extends` keyword.

### Encapsulation
- Restricts access to certain components using visibility keywords: `public`, `protected`, and `private`.

### Polymorphism
- Allows methods to do different things based on the object it is acting upon.

### Abstraction
- Hides complex implementation details and shows only the necessary features of an object.

## Syntax

### Defining a Class
```php
class ClassName {
    // Properties
    public $property1;
    protected $property2;
    private $property3;

    // Methods
    public function method1() {
        // Method code
    }

    protected function method2() {
        // Method code
    }

    private function method3() {
        // Method code
    }
}
```

### Creating an Object
```php
$object = new ClassName();
```

### Inheritance
```php
class ChildClass extends ParentClass {
    // Additional properties and methods
}
```

### Example
```php
class Animal {
    public $name;
    public $type;

    public function __construct($name, $type) {
        $this->name = $name;
        $this->type = $type;
    }

    public function makeSound() {
        echo "Some generic sound";
    }
}

class Dog extends Animal {
    public function makeSound() {
        echo "Bark";
    }
}

$dog = new Dog("Buddy", "Dog");
$dog->makeSound(); // Outputs: Bark
```

## Conclusion
OOP in PHP helps in organizing code better, making it more modular, reusable, and easier to maintain.