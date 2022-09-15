<?php
session_start();
// test user connecter
if (!isset($_SESSION['nom'])) {
    header('location:../connexion.php');
    exit();
}
include '../inc/functions.php';

// // connexion bd
$conn = connect();
// // creation des requette
// // creation de panier
$visiteur = $_SESSION['id'];
// $date_creation = date('y-m-d');


$idproduit = $_POST['produit']; // selectionner produit par id


$quantite = $_POST['quantite'];



// // requette
$requette = "SELECT prix,nom FROM produits WHERE id=$idproduit";
// //execution de la requette

$resultat = $conn->query($requette);
$produit = $resultat->fetch();

$total = $quantite * $produit['prix'];
$date = date("y-m-d");
if (!isset($_SESSION['panier'])) { // panier n'existe pas
    $_SESSION['panier'] = array($visiteur, 0, $date, array()); // creation d'une panier
}
$_SESSION['panier'][1] += $total;
$_SESSION['panier'][3][] = array($quantite, $total, $date, $date, $idproduit, $produit['nom']);
// echo "panier <br/> ";
// var_dump($_SESSION['panier']);
// echo "commande <br/> ";
// var_dump($_SESSION['panier'][3]);
// exit();
// $requette_panier = "INSERT INTO panier(visiteur,total,date_creation)Values('$visiteur','$total','$date')";

// $resultat = $conn->query($requette_panier);

// var_dump($resultat);
// $panier_id = $conn->lastInsertId();

// $requette = "INSERT INTO commande(quantite,total,panier,date_creation,date_modification,produit) values('$quantite','$total','$panier_id','$date','$date','$idproduit')";
// $resultat = $conn->query($requette);
header('location:../panier.php');