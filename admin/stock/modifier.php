<?php
session_start();
// 1-recuperation des données de la formulaire
$id = $_POST['idstock'];
$quantite = $_POST['quantite'];
// 2- la chaine de connexion
include "../../inc/functions.php";
$conn = connect();
// 3- creation de la requette
$requette = "UPDATE  stock SET quantite='$quantite' where id='$id' ";
// 4-execution de la requette
$resultat = $conn->query($requette);
if ($resultat) {
    header('location:list.php?modif=ok');
}