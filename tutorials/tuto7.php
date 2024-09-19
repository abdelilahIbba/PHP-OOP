<?php

// Define the Book class
class Livre {
    public $titre;     // Title of the book
    public $isbn;      // International Standard Book Number
    public $auteurs;   // Array of Author objects
}

// Define the Author class
class Auteur {
    public $nom;       // Last name of the author
    public $prenom;    // First name of the author
}

// Function to save a Book object to a JSON file
function enregistrerLivreDansFichier(Livre $livre, string $fichier) {
    // Convert the Livre object to a JSON string with pretty printing
    $json = json_encode($livre, JSON_PRETTY_PRINT);
    // Write the JSON string to the specified file
    file_put_contents($fichier, $json);
}

// Function to convert a stdClass object to a Livre object
function convertirEnLivre($data) : Livre {
    // Create a new Livre object
    $livre = new Livre();
    // Set the properties of the Livre object from the stdClass data
    $livre->titre = $data->titre;
    $livre->isbn = $data->isbn;
    // Convert each Author stdClass object to an Auteur object
    $livre->auteurs = array_map(function($auteur) {
        // Create a new Auteur object
        $auteurObj = new Auteur();
        // Set the properties of the Auteur object
        $auteurObj->nom = $auteur->nom;
        $auteurObj->prenom = $auteur->prenom;
        return $auteurObj;
    }, $data->auteurs);
    return $livre;
}

// Function to read a Book object from a JSON file
function lireLivreDepuisFichier(string $fichier) : Livre {
    // Read the JSON string from the file
    $json = file_get_contents($fichier);
    // Decode the JSON string into a stdClass object
    $data = json_decode($json);
    // Convert the stdClass object to a Livre object
    return convertirEnLivre($data);
}

// Example usage

// Create a new Livre object
$livre1 = new Livre();
$livre1->titre = "Le Petit Prince";  // Set the title of the book
$livre1->isbn = "9782266000016";     // Set the ISBN of the book
// Create a new Auteur object and add it to the array of authors
$livre1->auteurs = [
    new Auteur("Saint-Exupéry", "Antoine de")
];

// Save the Livre object to a JSON file
enregistrerLivreDansFichier($livre1, 'ma_bibliotheque.json');

// Read the Livre object from the JSON file
$livreLu = lireLivreDepuisFichier('ma_bibliotheque.json');
// Display the title of the book
echo $livreLu->titre; // Will display "Le Petit Prince"
