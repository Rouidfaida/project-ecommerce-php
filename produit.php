<?php
session_start();
include "inc/functions.php";

$categories = getAllCategories();
if (isset($_GET['id'])) {
  $produit =  getProduitByID($_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body>
    <?php
  include "inc/header.php"
  ?>

    <div class="row col-12 mt-4">
        <?php if (isset($_SESSION['etat']) && $_SESSION['etat'] == 0) { //utilisateur non validé
      print '      <div class="alert alert-danger">Compte non validé</div>
                                                        ';
    } ?>
        <div class="card col-8 offset-2">
            <img src=" image/<?php echo $produit['image'] ?> " class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo $produit['nom'] ?></h5>
                <p class="card-text"><?php echo $produit['description'] ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item mt-2"><?php echo $produit['prix'] ?> DT</li>
                <?php
        foreach ($categories as $index => $c) {
          if ($c['id'] == $produit['categorie']) {
            print '<button class="btn btn-success mb-2" >' . $c['nom'] . '</button>
            ';
          }
        }
        ?>
            </ul>
            <div class="col-12 m-2">
                <form class="d-flex" action="actions/commander.php" method="POST">
                    <input type="hidden" name="produit" value="<?php echo $produit['id'] ?>">
                    <input type="number" name="quantite" step="1" class="form-control"
                        placeholder="quantite de produit ...">
                    <button type="submit" class="btn btn-primary" <?php if (isset($_SESSION['etat']) && $_SESSION['etat'] == 0 || !isset($_SESSION['etat'])) {
                                                          echo "disabled";
                                                        } ?>>commander</button>

                </form>
            </div>
        </div>

    </div>
    <?php
  include "inc/footer.php";
  ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

</html>