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
    // lancement de la requete
    $sql = 'SELECT "Pays" FROM "Pays" ';

    // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

    // on va scanner tous les tuples un par un
    while ($data = mysql_fetch_array($req)) {
        // on affiche les résultats
        echo 'Pays : '.$data['Pays'].'<br />';
        echo "Bonjours";
    }
    mysql_free_result ($req);
    mysql_close ();

    ?>



</body>
</html>


