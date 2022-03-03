<?php 

    function connect(){
        $identifiant ="root";
        $motdepasse="";
        $serveur="localhost";
        $base="gpxperience2";

    //connexion
    
        $connexion=null;
        try{
            //new PDO("mysql:host=localhost;dbname=coursphp","root","");
            $connexion = new PDO("mysql:host=".$serveur.";dbname=".$base."; charset=UTF8", $identifiant,$motdepasse);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){    
            echo 'Echec de connexion'.$e->getMessage();
        }
        return $connexion;
    }    


    //deconnexion
    function disconnect($connexion){
        $connexion=null;
    }

    //Exécuter une requête SQL
    //Sans résultat (insert, update, delete)
    function execute($connexion,$sql){
        $connexion->exec($sql);
    }

    //Exécuter une requête AVEC résultat
    function query($connexion, $sql){
        $result=null;
        try{
            //pour protéger de l'injection sql
            $stmt = $connexion->prepare($sql);
            //Pour exécuter
            $stmt->execute();
            //Récupérer le résultat sous forme de tableau associatif
            $result = $stmt->fetchAll();
        }
        catch(PDOException $e){
            echo 'echec de query '.$e->getMessage();
        }
        return $result;
    }


?>