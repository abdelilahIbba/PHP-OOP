<?php


require(__DIR__ . "/../Service/BookService.php");
require_once(__DIR__ . '/../Entities/Book.php');



class BookPresentation
{
    private $bookService;

    public function __construct()
    {
        $this->bookService = new BookService(); // Initialize BookService once
    }

    public function viewBooks()
    {
        echo "\nViewing the list of Books\n";

        $books = $this->bookService->getBooks();

        if (empty($books)) {
            echo "No books available.\n";
        } else {
            $this->displayBooks($books);
        }

        echo "---------------------------------\n\n";
    }

    private function displayBooks(array $books)
    {
        foreach ($books as $bk) {
            echo "---------------------------------\n";
            echo "ISBN: " . $bk->getISBN() . "\n";
            echo "Title: " . $bk->getTitle() . "\n";
        }
    }

    public function addBook()
    {
        echo "\nAdding a new Book\n";
        $ISBN = $this->askForInput("Enter the ISBN of the book (or type 'back' to go back): ");
        if (strtolower($ISBN) === "back") return;

        $title = $this->askForInput("Enter the title of the book (or type 'back' to go back): ");
        if (strtolower($title) === "back") return;

        $newBook = new Book($ISBN, $title);
        $this->bookService->setBook($newBook);
        echo "Book added successfully\n\n";
    }

    private function askForInput($question)
    {
        echo $question;
        return trim(fgets(STDIN));
    }
}