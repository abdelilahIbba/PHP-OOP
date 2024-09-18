
<?php

class Personne {
    private $id;
    private $nom;
    private $passeport; // Un objet Passeport

    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPasseport() {
        return $this->passeport;
    }

    public function setPasseport(Passeport $passeport): void {
        $this->passeport = $passeport;
        $passeport->setPersonne($this); 
    }
}

class Passeport {
    private $numero;
    private $dateExpiration;
    private $personne; // Un objet Personne

    public function __construct($numero, $dateExpiration) {
        $this->numero = $numero;
        $this->dateExpiration = $dateExpiration;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getDateExpiration() {
        return $this->dateExpiration;
    }

    public function getPersonne() {
        return $this->personne;
    }

    public function setPersonne(Personne $personne): void {
        $this->personne = $personne;
    }
}

// Test One-to-One
$personne = new Personne(1, "Abdelilah");
$passeport = new Passeport("123456", "2025-10-15");

$personne->setPasseport($passeport);

echo "Personne: " . $personne->getNom() . "\n";
echo "Passeport Numéro: " . $passeport->getNumero() . "\n";
echo "Passeport Expiration: " . $passeport->getDateExpiration() . "\n";
?>

//One to Many 

<?php

class Auteur {
    private $id;
    private $nom;
    /** @var Livre[] */
    private $livres = [];

    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getLivres() {
        return $this->livres;
    }

    public function addLivre(Livre $livre): void {
        $this->livres[] = $livre;
        $livre->setAuteur($this);
    }
}

class Livre {
    private $id;
    private $titre;
    private $auteur; // Un objet Auteur

    public function __construct($id, $titre) {
        $this->id = $id;
        $this->titre = $titre;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getAuteur() {
        return $this->auteur;
    }

    public function setAuteur(Auteur $auteur): void {
        $this->auteur = $auteur;
    }
}

// Test One-to-Many
$auteur1 = new Auteur(1, "Dumas");
$livre1 = new Livre(1, "Les Trois Mousquetaires");
$livre2 = new Livre(2, "Le Comte de Monte-Cristo");

$auteur1->addLivre($livre1);
$auteur1->addLivre($livre2);

echo "Auteur: " . $auteur1->getNom() . "\n";
echo "Livres de l'auteur:\n";
foreach ($auteur1->getLivres() as $livre) {
    echo "- " . $livre->getTitre() . "\n";
}
?>
//Many-to-Many
<?php

class Etudiant {
    private $id;
    private $nom;
    /** @var Cours[] */
    private $cours = [];

    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getCours() {
        return $this->cours;
    }

    public function ajouterCours(Cours $cours): void {
        $this->cours[] = $cours;
        $cours->ajouterEtudiant($this);
    }
}

class Cours {
    private $id;
    private $nom;
    /** @var Etudiant[] */
    private $etudiants = [];

    public function __construct($id, $nom) {
        $this->id = $id;
        $this->nom = $nom;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getEtudiants() {
        return $this->etudiants;
    }

    public function ajouterEtudiant(Etudiant $etudiant): void {
        $this->etudiants[] = $etudiant;
    }
}

$etudiant = new Etudiant(1, "Alice");
$cours = new Cours(1, "PHP Basics");

$etudiant->ajouterCours($cours);