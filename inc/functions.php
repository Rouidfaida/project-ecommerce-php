    <?php
    function connect()
    {
      $DBuser = "root";
      $DBpassword = "";
      $DBname = "e-commerce";
      $servername = "localhost";
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //  echo "Connected successfully";
      } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
      return $conn;
    }
    function getAllCategories()
    {
      // 1- connexion vers bd
      $conn = connect();
      // 2- creation de la requete
      $requette = "SELECT * FROM  categories";
      // 3- execution de la requete
      $resultat = $conn->query($requette);
      // 4- resultat de la requete
      $categories = $resultat->fetchAll();
      return $categories;
      // var_dump($categories); pour tester l'affichage 
    }
    function getAllProducts()
    {
      // 1- connexion vers bd
      $conn = connect();

      // 2- creation de la requete
      $requette = "SELECT * FROM  produits";
      // 3- execution de la requete
      $resultat = $conn->query($requette);
      // 4- resultat de la requete
      $produits = $resultat->fetchAll();
      return $produits;
      // var_dump($categories); pour tester l'affichage  
    }
    function searchProduct($keyword)
    {
      $conn = connect();

      //2- creation de la requete
      $requette = "SELECT * FROM produits WHERE nom LIKE '%$keyword%'";
      //3- execution de la requete
      $resultat = $conn->query($requette);
      //4- resultat
      $produits = $resultat->fetchAll();
      return $produits;
    }
    function getProduitByID($id)
    {
      $conn = connect();
      // 1- creation de la requette
      $requette = "SELECT * FROM produits WHERE id= $id";
      $resultat = $conn->query($requette);
      // 4- resultat de la requete
      $produit = $resultat->fetch();
      return $produit;
    }
    function   AddVisiteur($data)
    {
      $conn = connect();
      $mpHash = md5($data['mp']);
      $requette = "INSERT INTO visiteurs (nom,prenom,email, telephone,mp) VALUES ('" . $data['nom'] . "','" . $data['prenom'] . "','" . $data['email'] . "','" . $data['telephone'] . "','" . $mpHash . "')";
      $resultat = $conn->query($requette);
      if ($resultat) {
        return true;
      } else {
        return false;
      }
    }

    function connecVisiteur($data)
    {
      $conn = connect();
      $email = $data['email'];
      $mp = md5($data['mp']);
      $requette = "SELECT * FROM visiteurs WHERE email='$email' AND mp='$mp'";
      $resultat = $conn->query($requette);
      $user = $resultat->fetch();
      return $user;
    }
    function connectAdmin($data)
    {
      $conn = connect();
      $email = $data['email'];
      $mp = md5($data['mp']);
      $requette = "SELECT * FROM administrateur WHERE email='$email' AND mp='$mp'";
      $resultat = $conn->query($requette);
      $user = $resultat->fetch();
      return $user;
    }
    function getAllUsers()
    {
      // 1- connexion vers bd
      $conn = connect();
      // 2- creation de la requete
      $requette = "SELECT * FROM  visiteurs WHERE etat=0";
      // 3- execution de la requete
      $resultat = $conn->query($requette);
      // 4- resultat de la requete
      $users = $resultat->fetchAll();
      return $users;
      // var_dump($categories); pour tester l'affichage 

    }
    function getStock()
    {
      $conn = connect();
      $requette = "SELECT s.id,p.nom ,s.quantite FROM produits p,stock s WHERE p.id=s.produit";
      $resultat = $conn->query($requette);
      // 4- resultat de la requete
      $stocks = $resultat->fetchAll();
      return $stocks;
    }
    function getAllPaniers()
    {
      $conn = connect();
      $requette = "SELECT v.nom ,v.prenom,v.telephone,p.id,p.total,p.etat,p.date_creation FROM panier p,visiteurs v WHERE p.visiteur=v.id";
      $resultat = $conn->query($requette);
      // 4- resultat de la requete
      $paniers = $resultat->fetchAll();
      return $paniers;
    }
    function getAllCommandes()
    {
      $conn = connect();
      $requette = "SELECT p.nom,p.image,c.quantite,c.total,c.panier FROM produits p,commande c WHERE c.produit=p.id";
      $resultat = $conn->query($requette);
      // 4- resultat de la requete
      $commandes = $resultat->fetchAll();
      return $commandes;
    }
    function changerEtatPanier($data)
    {
      $conn = connect();
      $requette = "UPDATE  panier SET etat='" . $data['etat'] . "' WHERE id='" . $data['panier_id'] . "'";
      $resultat = $conn->query($requette);
    }
    function getPanierByEtat($paniers, $etat)
    {
      $paniersEtat = array();
      foreach ($paniers as $p) {
        if ($p['etat'] == $etat) {
          array_push($paniersEtat, $p);
        }
      }
      return $paniersEtat;
    }
    function editAdmin($data)
    {
      $conn = connect();
      if ($data['mp'] != "") { // mot de passe non vide
        $requette = "UPDATE  administrateur SET nom='" . $data['nom'] . "' , email='" . $data['email'] . "' , mp='" . md5($data['mp']) . "'WHERE id='" . $data['id_admin'] . "'";
      } else {
        $requette = "UPDATE  administrateur SET nom='" . $data['nom'] . "' , email='" . $data['email'] . "' WHERE id='" . $data['id_admin'] . "'";
      }
      $resultat = $conn->query($requette);
      return true;
    }
    function getData()
    {
      $data = array();
      $conn = connect();
      //calculer nombre de produits dans la bd
      $requette = "SELECT  COUNT(*) FROM  produits";
      $resultat =  $conn->query($requette);
      $nbrProduits = $resultat->fetch();
      //calculer nombre de categories dans la bd
      $requette2 = "SELECT  COUNT(*) FROM  categories";
      $resultat =  $conn->query($requette2);
      $nbrCategorie =  $resultat->fetch();
      //calculer nombre de clients dans la bd
      $requette3 = "SELECT  COUNT(*) FROM  visiteurs";
      $resultat =  $conn->query($requette3);
      $nbrClient = $resultat->fetch();
      //calculer nombre de commande dans la bd
      $requette4 = "SELECT  COUNT(*) FROM  commande";
      $resultat =  $conn->query($requette4);
      $nbrCommande = $resultat->fetch();
      //calculer nombre de stock dans la bd
      $requette5 = "SELECT  COUNT(*) FROM  stock";
      $resultat =  $conn->query($requette5);
      $nbrStock = $resultat->fetch();
      //calculer nombre de panier dans la bd
      $requette6 = "SELECT  COUNT(*) FROM  panier";
      $resultat =  $conn->query($requette6);
      $nbrPanier = $resultat->fetch();

      $data['produits'] = $nbrProduits[0];
      $data['categories'] = $nbrCategorie[0];
      $data['clients'] = $nbrClient[0];
      $data['commande'] = $nbrCommande[0];
      $data['stock'] = $nbrStock[0];
      $data['panier'] = $nbrPanier[0];

      return $data;
    }
    ?>