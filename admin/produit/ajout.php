<?php
include "../../inc/functions.php";
session_start();
$nom = $_POST['nom'];
$description = $_POST['description'];
$prix = $_POST['prix'];
$categorie = $_POST['categorie'];
$createur = $_POST['createur'];
$quantite = $_POST['quantite'];
$date_creation = date("y-m-d");
// upload image
$target_dir = "../../image/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];
} else {
    echo "Sorry, there was an error uploading your file.";
}

$conn = connect();

try {
    // 3- creation de la requette
    $requette = "INSERT INTO produits (nom,description,prix,image,categorie,createur,date_creation)VALUES ('$nom','$description','$prix','$image','$categorie','$createur','$date_creation') ";
    // 4-execution de la requette
    $resultat = $conn->query($requette);

    if ($resultat) {
        $produit_id = $conn->lastInsertId();
        $requette2 = "INSERT INTO stock (produit,quantite,createur,date_creation) VALUES('$produit_id','$quantite','$createur','$date_creation')";
        if ($conn->query($requette2)) {
            header('location:list.php?ajout=ok');
        } else {
            echo "impossible d'ajouter le produit";
        }
    }
} catch (PDOException $e) {
    echo "connexion failled :" . $e->getMessage();

    if ($e->getCode() == 23000) {
        // header('location:list.php?erreur=duplicate');
    }
}