<?php
require("../DB/DataBase.php");

class BookDAO 
{
    private $dataBase;

    public function __construct() {
        $this->dataBase = new DataBase();
    }

    public function getAll(){
        return $this->dataBase->Books;
    }
    public function push($book){
        $this->dataBase->Books[] = $book;
        $this->dataBase->store();

    }
    

    
}