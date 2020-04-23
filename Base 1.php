<!--Inclusion du fichier qui contient le code pour la connexion (Peut aussi se mettre ici)-->
<?php
include("ConnexionBase.php")
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Projet S2 - Base </title>
  </head>
  <body>
    <!--entrer un pseudo-->
    <script type="text/JavaScript">
//function myfunction()
//{//
      	var
	Ps = prompt("Choisissez un pseudo entre 1 et 25 charactère ?","Indiquez le ici");
  location.href = 'Base 1.php'
//}//
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

                if (isset ($_POST['valider'])){
                    // On récupère les valeurs entrées par l'internaute :
                    $Pseudo=$_POST["'Ps'"];
                    $Score=$_POST['0'];

                    //On prépare la commande sql d'insertion
                    $req = mysql_query('INSERT INTO pseudo ('Pseudo', 'Score') VALUES ('.$Pseudo', '.$Score')');
                    /* on lance la commande (mysql_query) et on rédige un petit message d'erreur
        			      pour le cas où la requête ne passe pas (or die + mysql_error())
                    (Message qui intégrera les causes d'erreur sql)*/
                    $mysqli->query($req) or die ('Erreur SQL ! <br>'.$req.'<br />'.$mysqli->error);

        ////////////////AFFICHAGE DES PSEUDO ET SCORES  SUR LA PAGE WEB//////////////////


        				// Création de la requête
        				$req = "SELECT * FROM pseudo";
        				// Envoi de la requête
        				$result = $mysqli->query($req) or die('Erreur SQL ! <br>'.$req.'<br>'.$mysqli->error);;

        				// Parcourir le tableau des enregistremente et Affichage de chaque message
        				while($enreg = $result->fetch_array(MYSQLI_BOTH))
        					{
        					echo $enreg['pseudo']." ";
        					echo $enreg['score']."<br />";
        					}




        $mysqli -> close()
        ?>
    </body>
</html>
