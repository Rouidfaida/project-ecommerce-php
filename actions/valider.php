<?php
include '../inc/functions.php';
session_start();
// connect bd
$conn = connect();
//id visiteur
$visiteur = $_SESSION['id'];
$total = $_SESSION['panier'][1];
$date = date('y-m-d');
// creation panier
$requette_panier = "INSERT INTO panier(visiteur,total,date_creation)Values('$visiteur','$total','$date')";

// execuion requette
$resultat = $conn->query($requette_panier);

// var_dump($resultat);
$panier_id = $conn->lastInsertId();
$commandes = $_SESSION['panier'][3];
foreach ($commandes as $c) {
    //ajouter commande
    $quantite = $c[0];
    $total = $c[1];
    $idproduit = $c[4];
    $requette = "INSERT INTO commande(quantite,total,panier,date_creation,date_modification,produit) values('$quantite','$total','$panier_id','$date','$date','$idproduit')";
    // execution
    $resultat = $conn->query($requette);
}
// supprimer panier
$_SESSION['panier'] = null;
// redirection
header('location:../index.php');