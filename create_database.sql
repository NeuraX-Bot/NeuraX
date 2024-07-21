-- Crée la base de données
CREATE DATABASE your_database;

-- Sélectionne la base de données
USE your_database;

-- Crée la table des soumissions
CREATE TABLE submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    is_approved BOOLEAN DEFAULT FALSE
);
