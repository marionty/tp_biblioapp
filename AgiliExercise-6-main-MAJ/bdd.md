# Requête SQL pour la création de la base de données

CREATE DATABASE BiblioApp;

USE BiblioApp;

CREATE TABLE books (
  id INT NOT NULL AUTO_INCREMENT,
  isbn VARCHAR(13) NOT NULL,
  title VARCHAR(255) NOT NULL,
  author VARCHAR(255) NOT NULL,
  stock INT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE clients (
  id INT NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(255) NOT NULL,
  lastname VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE rentals (
  id INT NOT NULL AUTO_INCREMENT,
  book_id INT NOT NULL,
  client_id INT NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (book_id) REFERENCES books(id),
  FOREIGN KEY (client_id) REFERENCES clients(id)
);

INSERT INTO books (isbn, title, author, stock) VALUES
('9780679720201', '1984', 'George Orwell', 10),
('9780061120084', 'To Kill a Mockingbird', 'Harper Lee', 8),
('9780062024329', 'The Great Gatsby', 'F. Scott Fitzgerald', 5),
('9780547249643', 'The Hunger Games', 'Suzanne Collins', 12),
('9780140283334', 'One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 7),
('9780060935467', 'The Poisonwood Bible', 'Barbara Kingsolver', 4),
('9780307277743', 'The Road', 'Cormac McCarthy', 6),
('9780385474542', 'The Catcher in the Rye', 'J.D. Salinger', 2),
('9780679745587', 'The Bell Jar', 'Sylvia Plath', 1),
('9780385490818', 'The God of Small Things', 'Arundhati Roy', 9),
('9780375707569', 'Interpreter of Maladies', 'Jhumpa Lahiri', 11),
('9780399563096', 'The Immortal Life of Henrietta Lacks', 'Rebecca Skloot', 14),
('9780544944801', 'The Handmaid\'s Tale', 'Margaret Atwood', 6),
('9780385504202', 'The Da Vinci Code', 'Dan Brown', 8),
('9780062567712', 'American Gods', 'Neil Gaiman', 5),
('9780316044611', 'The Name of the Wind', 'Patrick Rothfuss', 7),
('9780451524935', 'Fahrenheit 451', 'Ray Bradbury', 3),
('9780553801477', 'Dune', 'Frank Herbert', 10),
('9780142424179', 'The Fault in Our Stars', 'John Green', 2),
('9782070368228', 'Harry Potter à l\'école des sorciers', 'J.K. Rowling', 10),
('9782070643059', 'Harry Potter et la Chambre des secrets', 'J.K. Rowling', 10),
('9782070643035', 'Harry Potter et le Prisonnier d\'Azkaban', 'J.K. Rowling', 10),
('9782070643066', 'Harry Potter et la Coupe de feu', 'J.K. Rowling', 10),
('9782070643073', 'Harry Potter et l\'Ordre du Phénix', 'J.K. Rowling', 10),
('9782070643080', 'Harry Potter et le Prince de sang-mêlé', 'J.K. Rowling', 10),
('9782070643097', 'Harry Potter et les Reliques de la Mort', 'J.K. Rowling', 10),
('9782253131432', 'Le Seigneur des Anneaux - Tome 1 La Communauté de l\'Anneau', 'J.R.R. Tolkien', 10),
('9782253131449', 'Le Seigneur des Anneaux - Tome 2 Les Deux Tours', 'J.R.R. Tolkien', 10),
('9782253131456', 'Le Seigneur des Anneaux - Tome 3 Le Retour du Roi', 'J.R.R. Tolkien', 10),
('9782290309259', 'Le Trône de fer - Tome 1 : La glace et le feu', 'George R.R. Martin', 10),
('9782290309297', 'Le Trône de fer - Tome 2 : Le donjon rouge', 'George R.R. Martin', 10),
('9782290309303', 'Le Trône de fer - Tome 3 : La bataille des rois', 'George R.R. Martin', 10),
('9782290309310', 'Le Trône de fer - Tome 4 : L\'ombre maléfique', 'George R.R. Martin', 10),
('9782290309327', 'Le Trône de fer - Tome 5 : L\'invincible forteresse', 'George R.R. Martin', 10),
('9782290309334', 'Le Trône de fer - Tome 6 : Les brigands', 'George R.R. Martin', 10),
('9782290309341', 'Le Trône de fer - Tome 7 : L\'épée de feu', 'George R.R. Martin', 10),
('9782290309358', 'Le Trône de fer - Tome 8 : Les noces pourpres', 'George R.R. Martin', 10),
('9782253151416', 'Le Hobbit', 'J.R.R. Tolkien', 10),
('9782070345021', 'Le Petit Prince', 'Antoine de Saint-Exupéry', 10);

INSERT INTO clients (firstname, lastname, email) VALUES
('Alice', 'Durand', 'alice.durand@example.com'),
('Bob', 'Martin', 'bob.martin@example.com'),
('Charlie', 'Garcia', 'charlie.garcia@example.com'),
('David', 'Smith', 'david.smith@example.com'),
('Eva', 'Jones', 'eva.jones@example.com'),
('Frank', 'Lee', 'frank.lee@example.com'),
('Gina', 'Miller', 'gina.miller@example.com'),
('Henry', 'Nguyen', 'henry.nguyen@example.com'),
('Isabel', 'Kim', 'isabel.kim@example.com'),
('John', 'Davis', 'john.davis@example.com');
 
INSERT INTO rentals (client_id, book_id, start_date, end_date) VALUES
(1, 1, '2022-01-01', '2022-01-15'),
(2, 3, '2022-01-02', '2022-01-09'),
(3, 4, '2022-01-03', '2022-01-10'),
(4, 5, '2022-01-04', '2022-01-11'),
(5, 2, '2022-01-05', '2022-01-12'),
(6, 6, '2022-01-06', '2022-01-20'),
(7, 7, '2022-01-07', '2022-01-21'),
(8, 8, '2022-01-08', '2022-01-22'),
(9, 9, '2022-01-09', '2022-01-23'),
(10, 10, '2022-01-10', '2022-01-24');