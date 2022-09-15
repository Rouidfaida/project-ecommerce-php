<?php
$idvisiteur=$_GET['id'];
// 2- la chaine de connexion
include "../../inc/functions.php";
$conn = connect();
$requette="UPDATE visiteurs SET  etat=1 WHERE id='$idvisiteur'";
$result=$conn->query($requette);
if($result){
    header('location:list.php?valider=ok');
}else{
    echo "erreur de validation";
}