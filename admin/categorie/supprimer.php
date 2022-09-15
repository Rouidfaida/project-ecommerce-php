<?php
// echo "id de catégorie  " . $_GET['idc'];
include "../../inc/functions.php";
$idcategorie = $_GET['idc'];
$conn = connect();
$requette = "DELETE FROM categories WHERE id='$idcategorie'";
$resultat = $conn->query($requette);
if ($resultat) {
    //echo "categorie supprimer";
    header('location:list.php?delete=ok');
}
