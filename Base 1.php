<!--Inclusion du fichier qui contient le code pour la connexion (Peut aussi se mettre ici)-->
<?php include("ConnexionBase.php") ?>
<!DOCTYPE html>

<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title>Projet S2 - Base </title>
  </head>
  <body>

    <!--DEBUT DU CODE PHP-->
       <?php

        // REQUETE 1: Création de la requête recupération des pseudo
        //////////////////////////////////ENREGISTREMENT EN BDD//////////////////////////////////
                    $mysqli = connectMaBase();
                    if (isset ($_GET['Ps'])){
                    // On récupère les valeurs entrées par l'internaute :
                    $Pseudo= $_GET['Ps'];

                    //On prépare la commande sql d'insertion
                    $req = 'INSERT INTO `joueurs` (`Pseudo`) VALUES ("' . mysqli_real_escape_string($mysqli, $Pseudo) . '")';
                    #$req = 'INSERT INTO `joueurs` (`Pseudo`) VALUES ('.$GET['Ps']')';
                    #'INSERT INTO joueurs('Pseudo') VALUES ('" . $_GET["PS"] . "')" )';#
                    header("location:http://localhost/Projet%20S2/Accueil2.html");
                    /* on lance la commande (mysql_query) et on rédige un petit message d'erreur
        			      pour le cas où la requête ne passe pas (or die + mysql_error())
                    (Message qui intégrera les causes d'erreur sql)*/
                    $mysqli->query($req) or die ('<p align="center"> Le Pseudo '.$Pseudo.' existe déjà!</p><br /> <form>
                      <center><input type="button" value="Retour" onclick=window.location.href="http://localhost/Projet%20S2/Accueil1.html">
                    </form></center>');
                    #}
                    $mysqli->close();

                  }

        ?>


    </body>
</html>
