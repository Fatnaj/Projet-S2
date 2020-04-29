<!--Inclusion du fichier qui contient le code pour la connexion (Peut aussi se mettre ici)-->
<?php include("ConnexionBase.php") ?>
<!DOCTYPE html>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Projet S2 - Base </title>
  </head>
  <body>

    <!--entrer un pseudo-->
    <script type="text/JavaScript">

      	var
	Ps = prompt("Choisissez un pseudo entre 1 et 25 charactère ?","Indiquez le ici");


      alert("Bonjour " + Ps + ". Prêt à jouer ?");
   </script>



    <!--DEBUT DU CODE PHP-->
        <?php

        // Déclaration des variables pour la connexion
  			$serveur = 'localhost';
  			$nom_base = 'guesscorrelation';
  			$login = 'root';		//utilisateur par défaut
  			$motdepasse = '';		//mot de passe par défaut pour "root" (pas de pwd)

        // connexion à MySQL
        $mysqli = connectMaBase(); //Apl de la fonction pour se connecter

        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: ". $mysqli->connect_error);
        }
        else {
            echo "serveur ".$mysqli->host_info." versions ".$mysqli->server_info."<br/>";
        }

        // REQUETE 1: Création de la requête recupération des pseudo
        //////////////////////////////////ENREGISTREMENT EN BDD//////////////////////////////////

                    if (isset ($_POST["valider"])){
                    // On récupère les valeurs entrées par l'internaute :
                    $Pseudo=$_POST['Ps'];


                    //On prépare la commande sql d'insertion
                    $req = mysqliquery("INSERT INTO joueurs ('Pseudo') VALUES ('.$Pseudo')");
                    /* on lance la commande (mysql_query) et on rédige un petit message d'erreur
        			      pour le cas où la requête ne passe pas (or die + mysql_error())
                    (Message qui intégrera les causes d'erreur sql)*/
                    $mysqli->query($req) or die ('Erreur SQL ! <br>'.$req.'<br />'.$mysqli->error);
                  }


        $mysqli -> close()
        ?>
    </body>
</html>
