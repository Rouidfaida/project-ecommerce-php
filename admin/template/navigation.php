<?php
$hostname = getenv('HTTP_HOST');
var_dump($hostname);
?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="http://<?php echo $_SERVER["HTTP_HOST"];
                                                                        ?>/ecommerce//admin/home.php">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER["HTTP_HOST"];
                                                    ?>/ecommerce//admin/categorie/list.php">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/ecommerce/admin/produit/list.php">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Produits
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/ecommerce/admin/stock/list.php">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Stock
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/ecommerce/admin/commandes/list.php">
                    <span data-feather="shopping-cart" class="align-text-bottom"></span>
                    Panier
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/ecommerce/admin/visiteur/list.php">
                    <span data-feather="users" class="align-text-bottom"></span>
                    users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2" class="align-text-bottom"></span>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"
                    href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/ecommerce/admin/profile.php">
                    <span data-feather="layers" class="align-text-bottom"></span>
                    profile
                </a>
            </li>
        </ul>

    </div>
</nav>