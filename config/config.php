<?php
// Paramètres de connexion à la base de données
$hostname = 'localhost';  // L'adresse du serveur MySQL (généralement localhost)
$username = 'root'; // Votre nom d'utilisateur MySQL
$password = 'mat29pau08'; // Votre mot de passe MySQL
$database = 'FFBSQ'; // Le nom de votre base de données MySQL

// Connexion à la base de données
$mysqli = new mysqli($hostname, $username, $password, $database);

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

// Définir le jeu de caractères de la connexion (facultatif, mais recommandé)
$mysqli->set_charset("utf8");

?>

