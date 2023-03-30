<?php

/**
 * Page d'un livre
 * --------------------------------
 */

 //classes
 require_once ('./classes/Book.php');
 $book = Book::getBook($_GET['id']);

// Entete
include './templates/header.html.php';

?>

<h1><?= $book['title']?></h1>

<?php


//contenu du livre
include './templates/book.html.php';

//pied de page
include './templates/footer.html.php';