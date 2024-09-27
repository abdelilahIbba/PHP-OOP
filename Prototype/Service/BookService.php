<?php 
include "../DataAccess/BookDAO.php";
class Bookservices {
  public function getbooks()
  {
      $books = new BookDAO();
      return $books->getBooks();
  }
    public function addbook($book)
  {
    $bookDao = new BookDAO();
    $bookDao->AddBook($book);
  }
}
