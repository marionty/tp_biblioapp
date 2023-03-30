<?php

// Formulaire de création d'un livre
// Path: templates/form.html.php

?>

<?php if (isset($_GET['id'])) : ?>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <label for="title">Nom du livre</label>
        <input type="text" name="title" value="<?= $book['title'] ?>">
        <label for="author">Auteur</label>
        <input type="text" name="author" value="<?= $book['author'] ?>">
        <label for="stock">Stock actuel</label>
        <input type="number" name="number" value="<?= $book['stock'] ?>">
        <input type="submit" value="Modifier">
    </form>
<?php else : ?>
    <form action="create.php" method="post">
        <input type="number" name="isbn" placeholder="ISBN">
        <input type="text" name="title" placeholder="Titre">
        <input type="text" name="author" placeholder="Auteur">
        <input type="number" name="stock" placeholder="Stock">
        <input type="submit" value="Ajouter">
    </form>
<?php endif; ?>