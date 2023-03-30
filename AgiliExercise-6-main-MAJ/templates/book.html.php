<?php

// Structure de la page d'un livre

// Chargement des fichiers nécessaires
require_once('./classes/Book.php');



$book = Book::getBook($_GET['id']); 

?>



<article>
    <img src="https://source.unsplash.com/random/?book,paper" alt="Couverture du livre : <?= $book['title'];?>">
<h3><?= $book['title'];?></h3>
<h6><?= $book['author'];?></h6>
<table>
    <thead>
        <td>ISBN</td>
        <td>Stock actuel</td>
    </thead>
    <tbody>
        
        <td><?= $book['isbn'];?></td>
        
        <td><?= $book['stock'];?></td>
        
    </tbody>
</table>
</article>

