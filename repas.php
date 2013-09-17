<?php
// on se connecte à notre base
$base = mysql_connect ('127.0.0.1', 'root', 'admin123');
mysql_select_db ('repas', $base) ;
?>
<html>
<head>
    <meta charset="utf-8" />
    <title>Repas</title>
    <link href="../css/bootstrap.css" rel="stylesheet" media="screen">
</head>

<body>


<?php
    //Début du formulaire
    echo '<form action="repas.php" method="post">';


        // création de la liste déroulante pays
        echo '<select name="pays">';
            // Requête sql pour récupérer les infos pour le pays
            $sql = "SELECT * FROM `Pays` WHERE 1 ";

            // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
            $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

            //Boucle pour créé les choix de la liste déroulante
            echo '<option value=0>............Choix du pays............</option>';
            while ($data = mysql_fetch_array($req))
            {
                echo '<option value='.$data['idPays'],'>'.$data['Pays'].'</option>';
            }
        echo '</select>';



        // création de la liste déroulante type
        echo '<select name="type">';
            // Requête sql pour récupérer les infos pour le pays
            $sql = "SELECT * FROM `Type` ";

            // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
            $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

            //Boucle pour créé les choix de la liste déroulante
            echo '<option value=0>....Choix du type de repas....</option>';
            while ($data = mysql_fetch_array($req))
            {
                echo '<option value='.$data['idPays'],'>'.$data['type'].'</option>';
            }
            mysql_free_result ($req);
            mysql_close ();
        echo '</select>';



    echo '</form>';




    // Fermeture de la connection pour libérer les ressources
    mysql_close ();
?>



</body>
</html>


