<?php

require "../DataAccess/BookDAO.php";

class BookService {
  public function getBooks() {
      $bookDAO = new BookDAO();
      return $bookDAO->getBooks();
  }
  public function setBooks($books){
      $bookDAO = new BookDAO();
      $bookDAO->setBooks($books);
  }

}
