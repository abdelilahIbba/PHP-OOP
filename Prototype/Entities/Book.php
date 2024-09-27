<?php
class Book {

    // private $id;
    private $title;
    private $ISBN;

    public function __construct($title, $ISBN) {

        $this->title = $title;
        $this->ISBN = $ISBN;
    }

// Getters
    // public function getId() {
    //     return $this->id;
    // }
    public function getTitle() {
        return $this->title;
    }
    public function getISBN() {
        return $this->ISBN;
    }
// Setters
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setISBN($ISBN) {
        $this->ISBN = $ISBN;
    }
    public function Display() {
    return "Title : " . $this->getTitle() ." ISBN : ". $this->getISBN() . "\n";
    }
}
