<?php

class Person {
    protected string $name;

    public function __construct(string $name) {
        $this->name = $name;
    }

    public function __destruct() {
        echo "Destroying " . __CLASS__ . "\n";
    }
}

class Student extends Person {
    private string $courseName;
    private string $age;

    public function __construct(string $name, string $courseName, string $age) {
        parent::__construct($name);
        $this->courseName = $courseName;
        $this->age = $age;
    }

    public function __destruct() {
        echo "Destroying " . __CLASS__ . "\n";
        parent::__destruct();
    }

    public function getDetails() {
        echo "Name: " . $this->name . ", Course Name: " . $this->courseName . ", Age: " . $this->age . "\n";
    }
}

$dipak = new Student('Dipak', 'MCA', '22');

$dipak->getDetails();
