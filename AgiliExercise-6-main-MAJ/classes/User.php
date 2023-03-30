<?php
/**
 * Classe : User
 * -----------------
 * Classe regroupant toutes les propiétés et méthodes des Utilisateurs qui empruntent et qui gère la bibliothèque.
 */

// Chargement des fichiers nécessaires
require_once('./config/connect.php');

class User
{
    // Propriétés (attributs, variables)
    public $lastname;
    public $firstname;
    public $city;
    public $email;
    public $phone;
    public $status;

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
        string $lastname,
        string $firstname,
        string $city,
        string $email,
        int $phone,
        bool $status
        )
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->city = $city;
        $this->email = $email;
        $this->phone = $phone;
        $this->status = $status;
    }

    /**  
     * Ajouter un utilisateur : méthode add()
     * --------------------
     * Ici on utilise une méthode statique car on ne manipule pas d'objet
     * "Static" signifie que la méthode est liée à la classe et non pas à l'objet, ce qui permet d'y accéder sans avoir à instancier la classe.
     * --------------------
     */
    public static function add($lastname, $firstname, $city, $email, $phone, $status)
    {
        // Initialisation de la connexion
        $pdo = connect();

        // Préparation de la requête
        $sql = "INSERT INTO users (lastname, firstname, city, email, phone, status) VALUES (:lastname, :firstname, :city, :email, :phone, :status)";
        $statement = $pdo->prepare($sql);

        // Liaison des paramètres
        $statement->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $statement->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);

        // Exécution de la requête
        $statement->execute();
    }

    /**  
     * Modifier un utilisateur : méthode update()
     * --------------------
     * Ici on utilise une méthode statique car on ne manipule pas d'objet
     * "Static" signifie que la méthode est liée à la classe et non pas à l'objet, ce qui permet d'y accéder sans avoir à instancier la classe.
     * --------------------
     */
    public static function update($lastname, $firstname, $city, $email, $phone, $status)
    {
        // Initialisation de la connexion
        $pdo = connect();

        // Préparation de la requête
        $sql = "UPDATE users SET lastname = :lastname, firstname = :firstname, city = :city, email = :email, phone = :phone, status = :status WHERE id = :id";
        $statement = $pdo->prepare($sql);

        // Liaison des paramètres
        $statement->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $statement->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $statement->bindParam(':city', $city, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':status', $status, PDO::PARAM_STR);

        // Exécution de la requête
        $statement->execute();
    }

    /**  
     * Supprimer un utilisateur : méthode delete()
     * --------------------
     * Ici on utilise une méthode statique car on ne manipule pas d'objet
     * "Static" signifie que la méthode est liée à la classe et non pas à l'objet, ce qui permet d'y accéder sans avoir à instancier la classe.
     * --------------------
     */
    public static function delete($id)
    {
        // Initialisation de la connexion
        $pdo = connect();

        // Préparation de la requête
        $sql = "DELETE FROM users WHERE id = :id";
        $statement = $pdo->prepare($sql);

        // Liaison des paramètres
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête
        $statement->execute();
    }
}