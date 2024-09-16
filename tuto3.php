<?php

class Animal {
    public function faireDuBruit() {
        echo "The animal makes noise.\n";
    }
}

class Chien extends Animal {
    public function faireDuBruit() {
        echo "Ouaf !\n";
    }
}

class Chat extends Animal {
    public function faireDuBruit() {
        echo "Miaou !\n";
    }
}

$animaux = [new Chien(), new Chat(), new Animal()];

foreach ($animaux as $animal) {
    $animal->faireDuBruit();
}
