<?php
include "inc/functions.php";
$categories = getAllCategories();
if (!empty($_POST)) { // button search clicked
  // echo " button search clicked ";
  //echo $_POST['search'];
  $produits = searchProduct($_POST['search']);
} else {
  $produits = getAllProducts();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <?php
  session_start();
  include "inc/header.php";
  ?>
    <div class="row col-12 mt-4">
        <?php
    foreach ($produits as $produit) {
      print '   <div class="col-3 mt-2">
      <div class="card" style="width: 18rem;">

          <img src=" image/' . $produit['image'] . '" class="card-img-top " alt="..." />
          <div class="card-body">
            <h5 class="card-title">' . $produit['nom'] . '</h5>
            <p class="card-text">
           ' . $produit['description'] . '
            </p>
            <a href="produit.php?id=' . $produit['id'] . '" class="btn btn-primary">Afficher detail</a>
          </div>
        </div>
      </div>';
    }
    ?>
    </div>
    <?php
  include "inc/footer.php";
  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>


</html>