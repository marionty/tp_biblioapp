<?php
/**
 * Classe : Admin
 * -----------------
 * Classe regroupant toutes les propiétés et méthodes des Administrateurs
 */

 require_once('./config/connect.php');

class Admin extends User
{
    // Propriétés (variables)
    private $password;

    // Méthodes (fonctions)
    public function __construct(
        string $lastname,
        string $firstname,
        string $city,
        string $email,
        string $phone,
        string $password
        )
    {
        parent::__construct($lastname, $firstname, $city, $email, $phone);
        $this->password = $password;
    }
}

// Rechcercher des données (livres, emprunts)

