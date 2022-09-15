<?php
session_start();
$total = 0;
if (isset($_SESSION['panier'][3])) {
    $total = $_SESSION['panier'][1];
}
include "inc/functions.php";
$categories = getAllCategories();
if (!empty($_POST)) { // button search clicked
    // echo " button search clicked ";
    //echo $_POST['search'];
    $produits = searchProduct($_POST['search']);
} else {
    $produits = getAllProducts();
}
$commande = array();
if (isset($_SESSION['panier'])) {
    if (count($_SESSION['panier'][3]) > 0) {
        $commande = $_SESSION['panier'][3];
    }
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
    include "inc/header.php";
    ?>
    <div class="row col-12 mt-4 p-5">
        <h1>Panier utilisateur</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">produit</th>
                    <th scope="col">quantité</th>
                    <th scope="col">total</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($commande as $index => $c) {
                    print '  <tr>
        <th scope="row">' . ($index + 1) . '</th>
        <td>' . $c[5] . '</td>
        <td>' . $c[0] . ' pieces</td>
        <td>' . $c[1] . ' DT</td>
        <td>   <a href="actions/enlever-produit-panier.php?id=' . $index . '" class="btn btn-danger" >supprimer</a>
</td>

      </tr>';
                }
                ?>

            </tbody>
        </table>
        <div class="text-end mt-2">

            <h1>Total : <?php echo $total; ?> DT</h1>
            <hr />
            <a href="actions/valider.php" class="btn btn-success" style="width:100px"> valider</a>

        </div>
    </div>
    <?php
    include "inc/footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>


</html>