<?php
class Book {
    private $id;
    private $title;
    private $isbn;

    public function __construct( $title, $isbn) {
        $this->id = time();
        $this->title = $title;
        $this->isbn = $isbn;
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function getIsbn(){
        return $this->isbn;
    }
    public function setIsbn($isbn){
        $this->isbn = $isbn;
    }

}
