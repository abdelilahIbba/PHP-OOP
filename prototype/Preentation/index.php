<?php
require "./BookPresentation.php";  // Assuming this file exists and contains the BookPresentation class

function askQuestion($question) {
    echo $question;
    return trim(fgets(STDIN));
}

function libraryManagement() {
    // Clear the terminal screen
    echo chr(27) . chr(91) . 'H' . chr(27) . chr(91) . 'J';
    echo "Welcome to the Books List Manager\n\n";

    $exitProgram = false;  // Corrected variable name
    while (!$exitProgram) {
        // Display menu
        echo "+------------------------------------+\n";
        echo "|        Books Management            |\n";
        echo "|------------------------------------|\n";
        echo "|    Please choose an action:        |\n";
        echo "|------------------------------------|\n";
        echo "| [v] - View the Books               |\n";
        echo "| [a] - Add a new Book               |\n";
        echo "| [exit] - Exit the program          |\n";
        echo "+------------------------------------+\n\n";

        // Ask user for input inside the loop
        $action = askQuestion("Enter your choice (v, a, exit): ");
        
        // Handle user input
        switch (strtolower($action)) {
            case 'v':
                $bookPresentation = new BookPresentation();
                $bookPresentation->viewBooks();  // Correct method name (viewBooks)
                break;

            case 'a':
                $bookPresentation = new BookPresentation();
                $bookPresentation->addBook();  // Correct method name (addBook)
                break;

            case 'exit':
                $exitProgram = true;  // Corrected variable name
                break;

            default:
                echo "Invalid choice. Please try again.\n";
                break;
        }
    }

    // Exiting the program
    echo "Exiting the program. Goodbye!\n";
}

// Start the program
libraryManagement();
