<?php
session_start();
// 1-recuperation des données de la formulaire
$nom = $_POST['nom'];
$description = $_POST['description'];
$createur = $_SESSION['id'];
$date_creation = date("y-m-d");
// 2- la chaine de connexion
include "../../inc/functions.php";
$conn = connect();

try {
    // 3- creation de la requette
    $requette = "INSERT INTO categories (nom, description,createur,date_creation)VALUES ('$nom','$description','$createur','$date_creation') ";
    // 4-execution de la requette
    $resultat = $conn->query($requette);
    if ($resultat) {
        header('location:list.php?ajout=ok');
    }
} catch (PDOException $e) {
    if ($e->getCode() == 23000) {
        header('location:list.php?erreur=duplicate');
    }
}
