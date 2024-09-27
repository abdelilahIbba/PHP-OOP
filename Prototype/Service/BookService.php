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
    
    $existingBooks = $bookDao->getBooks();
    foreach ($existingBooks as $existingBook) {
        if ($existingBook->getISBN() === $book->getISBN()) {
            return "Book with ISBN: " . $book->getISBN() . " already exists!";
        }
    }

    $bookDao->AddBook($book);
    return "Book added successfully.";
  }
}
