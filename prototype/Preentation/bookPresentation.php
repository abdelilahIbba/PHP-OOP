<?php
require "../Services/BookServices.php";
require "../Entity/Book.php";

class BookPresentation {
    public function viewBooks() {
        echo "\nViewing the list of Books\n";

        $Bookservices = new BookService();
        $books = $Bookservices->getBooks();
        
        if (!empty($books)) {
            foreach ($books as $book) {
                echo "ID: ".$book['id']."\n"; // Changed to access the array format
                echo "Title: ".$book['title']."\n"; 
                echo "ISBN: ".$book['isbn']."\n";
            }
        } else {
            echo "No books available";
        }
        echo "---------------------------------\n\n";
    }

    public function addBook() {
        echo "\nAdding a new book\n";
        $title = askQuestion("Enter the title: ");
        $isbn = askQuestion("Enter the ISBN: ");

        $new_book = new Book($title, $isbn);
        $BookService = new BookService();
        $BookService->setBooks($new_book); // Pass book details as an associative array
        echo "Book added successfully\n";
    }
}
