<?php
require "../DB/Database.php";
class BookDAO {
public function getBooks() {
    $db = new Database();
    return $db->Books;
}
public function setBooks($Book){
$db = new Database();
    $db->Books[] = $Book;
    $db->saveData();
}
 
}
