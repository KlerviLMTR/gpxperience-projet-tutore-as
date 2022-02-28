<!-- --------------- Page HTML/php d'importation de fichiers ---------------- -->

<html>
<head>
  <meta charset="utf-8">
</head>
<body>
<?php

    //Connexion au serveur MySQL
    $server = "localhost";
    $login = 'root';
    $mdp = "";
    $db = 'importations gpx'; 

    try {
        $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }


    //ecriture dans la BDD
    for ($i = 0; $i < count($_FILES['monfichier']['name']); $i++) {

        $nomOrigine = $_FILES['monfichier']['name'][$i];
        $elementsChemin = pathinfo($nomOrigine);
        $extensionFichier = $elementsChemin['extension'];
        $extensionsAutorisees = array("gpx");
        if (!(in_array($extensionFichier, $extensionsAutorisees))) {
            echo "Le fichier n'a pas l'extension attendue";
        } else {    
            // Copie dans le repertoire du script avec un nom
            // incluant l'heure a la seconde pres 
            // ------------> Nom à changer en fonction de nos besoins
            $repertoireDestination = dirname(__FILE__)."/fichiers_importes/";
            $nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;

            if (move_uploaded_file($_FILES["monfichier"]["tmp_name"][$i], 
                                            $repertoireDestination.$nomDestination)) {
                echo "Le fichier temporaire ".$_FILES["monfichier"]["tmp_name"][$i].
                        " a été déplacé vers ".$repertoireDestination.$nomDestination;
            } else {
                echo "Le fichier n'a pas été uploadé (trop gros ?) ou ".
                        "Le déplacement du fichier temporaire a échoué.".
                        " Vérifiez l'existence du répertoire.".$repertoireDestination;
            }
        }



            //Remplir la BDD avec le chemin du fichier
            $req = $linkpdo->prepare('INSERT INTO fichiergpx(chemin) VALUES(:chemin)');
            $req->execute(array('chemin' => $repertoireDestination.$nomDestination));
    }

?>
</body>
</html>
    
