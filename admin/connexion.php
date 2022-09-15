<?php
session_start();
if (isset($_SESSION['nom'])) {
    // header('location:profile.php');
}
include "../inc/functions.php";

$user = true;
if (!empty($_POST)) { // on click sur enregistrer
    $user = connectAdmin($_POST);
    if (is_array($user) && count($user) > 0) { // utilisateur connecter
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['mp'] = $user['mp'];
        header('location:profile.php'); // redirection vers profile.php
    }
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E-SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.32/sweetalert2.css">

</head>

<body>

    <!-- fin nav -->
    <div class="col-12 p-5">
        <h1 class="text-center">Espace Admin : Connexion</h1>
        <form action="connexion.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" />
                <div id="emailHelp" class="form-text">
                    We'll never share your email with anyone else.
                </div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="mp" />
            </div>
            <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </form>
    </div>
    <!-- footer -->
    <?php
    include "../inc/footer.php";
    ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.32/sweetalert2.all.min.js"></script>
<?php if (!$user) {
    print "
<script>
Swal.fire({
 icon: 'error',
 title: 'Error...',
 text: 'Coordonnée  non valide!',
 confirmButtonText :'ok',
 timer:2000,
})
</script>
";
}

?>

</html>