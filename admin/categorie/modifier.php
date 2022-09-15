<?php
session_start();
// 1-recuperation des données de la formulaire
$id = $_POST['idc'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$date_modification = date("y-m-d");
// 2- la chaine de connexion
include "../../inc/functions.php";
$conn = connect();
// 3- creation de la requette
$requette = "UPDATE  categories SET nom='$nom',description='$description',date_modification='$date_modification' where id='$id' ";
// 4-execution de la requette
$resultat = $conn->query($requette);
if ($resultat) {
    header('location:list.php?modif=ok');
}
