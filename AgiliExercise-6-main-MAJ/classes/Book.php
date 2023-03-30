<?php
/**
 * Classe : Book
 * -----------------
 * Classe regroupant toutes les propiétés et méthodes des Livres
 */

// Chargement des fichiers nécessaires
require_once('./config/connect.php');

class Book
{
    // Propriétés (attributs, variables)
    public $isbn;
    public $title;
    public $author;
    public $stock;

    /**
     * Méthodes (fonctions)
     * --------------------
     * Les méthodes sont les fonctions qui sont propres à la classe
     * Elles sont appelées "méthodes" car elles sont propres à la classe et non pas à l'objet 
     */
    
    /**
     * Constructeur 
     * --------------------
     * Le constructeur est une méthode qui est appelée automatiquement lors de l'instanciation de la classe
     */
    public function __construct(
        int $isbn,
        string $title,
        string $author,
        bool $stock,
        )
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->stock = $stock;
    }

    /**  
     * Ajouter un livre : méthode add()
     * --------------------
     * Ici on utilise une méthode statique car on ne manipule pas d'objet
     * "Static" signifie que la méthode est liée à la classe et non pas à l'objet, ce qui permet d'y accéder sans avoir à instancier la classe.
     * --------------------
     * @param int $isbn
     * @param string $title
     * @param string $author
     * @param int $stock
     * @return void // void signifie que la méthode ne retourne rien
     * @throws Exception // Exception est une classe PHP qui permet de gérer les erreurs
     * @throws PDOException // PDOException est une classe PHP qui permet de gérer les erreurs
    */
    public static function add($isbn, $title, $author, $stock)
    {
        // Initialisation de la connexion
        $pdo = connect();
        
        // Préparation de la requête
        $sql = "INSERT INTO books (isbn, title, author, stock) VALUES (:isbn, :title, :author, :stock)";
        $statement = $pdo->prepare($sql);
        
        // Liaison des paramètres
        $statement->bindValue(':isbn', $isbn, PDO::PARAM_INT);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':author', $author, PDO::PARAM_STR);
        $statement->bindValue(':stock', $stock, PDO::PARAM_INT);
        
        // Exécution de la requête
        $statement->execute();
    }

    /**  
     * Modifier un livre : méthode update()
     * -----------------------------------------
     * Ici on utilise une méthode statique car on ne manipule pas d'objet
     * "Static" signifie que la méthode est liée à la classe et non pas à l'objet, ce qui permet d'y accéder sans avoir à instancier la classe.
     * -----------------------------------------
     * @param int $isbn
     * @param string $title
     * @param string $author
     * @param int $stock
     * @return void // void signifie que la méthode ne retourne rien
     * @throws Exception // Exception est une classe PHP qui permet de gérer les erreurs
     * @throws PDOException // PDOException est une classe PHP qui permet de gérer les erreurs
    */
    public static function update($isbn, $title, $author, $stock)
    {
        // Initialisation de la connexion
        $pdo = connect();
        
        // Préparation de la requête
        $sql = "UPDATE books SET title = :title, author = :author, stock = :stock WHERE isbn = :isbn";
        $statement = $pdo->prepare($sql);
        
        // Liaison des paramètres
        $statement->bindValue(':isbn', $isbn, PDO::PARAM_STR);
        $statement->bindValue(':title', $title, PDO::PARAM_STR);
        $statement->bindValue(':author', $author, PDO::PARAM_STR);
        $statement->bindValue(':stock', $stock, PDO::PARAM_INT);
        
        // Exécution de la requête
        $statement->execute();
    }

    /**  
     * Supprimer un livre : méthode delete()
     * -----------------------------------------
     * Ici on utilise une méthode statique car on ne manipule pas d'objet
     * "Static" signifie que la méthode est liée à la classe et non pas à l'objet, ce qui permet d'y accéder sans avoir à instancier la classe.
     * -----------------------------------------
     * @param int $isbn
     * @return void // void signifie que la méthode ne retourne rien
     * @throws Exception // Exception est une classe PHP qui permet de gérer les erreurs
     * @throws PDOException // PDOException est une classe PHP qui permet de gérer les erreurs
    */
    public static function delete($isbn)
    {
        // Initialisation de la connexion
        $pdo = connect();

        // Préparation de la requête
        $sql = 'DELETE FROM books WHERE isbn = :isbn';
        $statement = $pdo->prepare($sql);

        // Liaison des paramètres
        $statement->bindValue(':isbn', $isbn, PDO::PARAM_STR);

        // Exécution de la requête
        $statement->execute();
    }


  // Récupérer un livre : méthode getBook()

    public static function getBook($id)
    {
       // Initialisation de la connexion
       $pdo = connect();

       // Préparation de la requête
       $sql = 'SELECT * FROM books WHERE id=:id';
       $statement = $pdo->prepare($sql);

       //liaison des paramètres
       $statement->bindValue(':id', $id, PDO::PARAM_INT);

       // Exécution de la requête
       $statement->execute();

       // Récupération des données
       $book = $statement->fetch(PDO::FETCH_ASSOC);

       // Retour des données
       return $book;
    }

    // Récupérer tous les livres : méthode getBooks()
    public static function getBooks()
    {
        // Initialisation de la connexion
        $pdo = connect();

        // Préparation de la requête
        $sql = 'SELECT * FROM books';
        $statement = $pdo->prepare($sql);

        // Exécution de la requête
        $statement->execute();

        // Récupération des données
        $books = $statement->fetchAll();

        // Retour des données
        return $books;
    }
}