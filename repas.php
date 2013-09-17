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
    if(isset($_REQUEST['OK']))
    {
        if($_REQUEST['pays'] != 0 && $_REQUEST['type'] != 0 && $_REQUEST['repas'] != "")
        {

            echo "pays diff de 0";

        }
        else
        {
            echo "pays = 0";
        }







    }


    //Début du formulaire
    echo '<form action="repas.php" method="post" class="form-horizontal"><legend>Entrer un nouveau plat...</legend>';


        // Création de la liste déroulante pays
        echo '<div class="control-group">
                <label class="control-label" for="pa">Lieu d&#146;origine</label>
                <div class="controls">';
        echo '<select name="pays" id="pa">';
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
        echo '</select></div></div>';

        // Création de la liste déroulante type
        echo '<div class="control-group">
                <label class="control-label" for="ty">Type du plat</label>
                <div class="controls"> ';
        echo '<select name="type" id="ty">';
            // Requête sql pour récupérer les infos pour le pays
            $sql = "SELECT * FROM `Type` ";

            // on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
            $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

            //Boucle pour créé les choix de la liste déroulante
            echo '<option value=0>....Choix du type de repas....</option>';
            while ($data = mysql_fetch_array($req))
            {
                echo '<option value='.$data['idType'],'>'.$data['type'].'</option>';
            }
        echo '</select></div></div>';


        // Création du champs pour entrer le nom du repas
        echo '<div class="control-group">
                <label class="control-label" for="re">Nom du repas</label>
                <div class="controls">
                    <input type="text" id="re" name="repas" placeholder="Nom du repas">
                </div>
            </div>';

        // Création de la section pour choisir si le plat est vététarien ou non
        echo '<div class="control-group">
                <label class="control-label" >Ce plat est-il végétarien ou normal?</label>
                <div class="controls">
                    <label class="radio inline">
                        <input type="radio" name="vege" id="inlineOptionsRadios1" value="true" >
                        Plat végétarien
                    </label>
                    <label class="radio inline">
                        <input type="radio" name="vege" id="inlineOptionsRadios2" value="false" checked>
                        Plat normal
                    </label>
                </div>
            </div>';

        // Création du champs pour entrer le prix du repas
        echo '<div class="control-group">
                        <label class="control-label" for="pr">Prix</label>
                        <div class="controls">
                            <div class="input-prepend input-append">
                                <input type="text" id="pr" name="prix" placeholder="Prix">
                                <span class="add-on">$</span>
                            </div>
                        </div>
                    </div>';

        // Création du bouton valider
        echo '<div class="form-actions">
                <button type="submit" name="OK" class="btn btn-primary">Envoyer</button>
                <button type="submit" name="Cancel" class="btn btn-small">Annuler</button>
            </div>';



    echo '</form>';


    // Fermeture de la connection pour libérer les ressources
    mysql_close ();
?>



</body>
</html>


