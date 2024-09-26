<?php
require("../DataAccess/BookDAO.php");

class BookService
{
  public function getBooks()
  {
    $dataBase = new BookDAO();
    return $dataBase->getAll();
  }

  public function setBook($book)
  {
    $bookDAO = new BookDAO();
    $bookDAO->push($book);
  }
}
