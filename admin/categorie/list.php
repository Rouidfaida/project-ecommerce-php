<?php
session_start();
include "../../inc/functions.php";
$categories = getAllCategories();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Admin profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">





    <link href="../../css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Company name</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search"
            aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="../../deconnexion.php">Deconnection</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <?php
            include '../template/navigation.php' ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Liste des categories</h1>


                    <div>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</a>
                    </div>

                </div>
                <div>
                    <!-- liste start  -->
                    <?php
                    if (isset($_GET['ajout']) && $_GET['ajout'] == 'ok') {
                        print '<div class="alert alert-success">
                        categorie ajouter avec success

                    </div>';
                    }

                    ?>
                    <?php
                    if (isset($_GET['delete']) && $_GET['delete'] == 'ok') {
                        print '<div class="alert alert-success">
                        categorie supprimer avec success

                    </div>';
                    }

                    ?>
                    <?php
                    if (isset($_GET['modif']) && $_GET['modif'] == 'ok') {
                        print '<div class="alert alert-success">
                        categorie modifier avec success

                    </div>';
                    }

                    ?>
                    <?php
                    if (isset($_GET['erreur']) && $_GET['erreur'] == 'duplicate') {
                        print '<div class="alert alert-danger">
                      nom de  categorie existe d??ja

                    </div>';
                    }

                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($categories as $c) {
                                $i++;
                                print '  <tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $c['nom'] . '</td>
                                <td>' . $c['description'] . '</td>
                                <td>
                                    <a  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal' . $c['id'] . '">Modifier</a>
                                    <a onClick="return popUpDeleteCategorie()" href="supprimer.php?idc=' . $c['id'] . '" class="btn btn-danger">Supprimer</a>


                                </td>
                            </tr>';
                            }
                            ?>


                        </tbody>
                    </table>

                </div>


            </main>
        </div>
    </div>
    <!-- Button trigger modal -->

    <?php
    foreach ($categories as $index => $categories) { ?>
    <!-- Modal modification-->
    <div class="modal fade" id="editModal<?php echo $categories['id']; ?>" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier categorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="modifier.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" value="<?php echo $categories['id']; ?>" name="idc" />
                            <input type="text" name="nom" class="form-control" value="<?php echo $categories['nom']; ?>"
                                placeholder="nom de categorie ..." />
                        </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control"
                                placeholder="description de categorie ..."><?php echo $categories['description']; ?></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="Submit" class="btn btn-primary">Modifier</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- modal Ajout  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter categorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="ajout.php" method="POST" id="addform">
                        <div class="mb-3" id="blocknom">
                            <input type="text" name="nom" id="nom" class="form-control"
                                placeholder="nom de categorie ...">
                        </div>
                        <div class="mb-3">
                            <textarea name="description" class="form-control"
                                placeholder="description de categorie ..."></textarea>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ajouter</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../../css/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="../../js/dashboard.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>
<script>
function popUpDeleteCategorie() {
    return confirm("vouez-vous vraiment supprimer la categorie ")
}
</script>
<script>

</script>
</body>

</html>