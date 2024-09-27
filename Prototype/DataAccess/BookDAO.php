<?php
require "../DB/DataBase.php";

class BookDAO
{
    public function getBooks()
    {
        $Books = new Database();
        return $Books->getBooks();
    }

    public function AddBooks($book)
    {
        $Books = new Database();
        $Books->setBooks($book);
        $Books->saveData();
    }
}
