<?php
class Animal {
    public function makeSound() {
        echo "The animal makes a sound.\n";
    }
}

// Derived class: Dog
class Dog extends Animal {
    public function makeSound() {
        echo "Woof!\n";
    }
}

// Derived class: Cat
class Cat extends Animal {
    public function makeSound() {
        echo "Meow!\n";
    }
}

// Using polymorphism
$animals = [new Dog(), new Cat(), new Animal()];

foreach ($animals as $animal) {
    $animal->makeSound();
}
 