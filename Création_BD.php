<?php

$server;
$db;
$user;
$mdp;

try {
    $conn = new PDO("mysql:host=$server;dbname=$db, $user, $mdp");
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
//permet de créer des tables 
$sql = "CREATE TABLE Label(
   Id_Label COUNTER,
   Libelle VARCHAR(50),
   Couleur VARCHAR(20),
   PRIMARY KEY(Id_Label)
);

CREATE TABLE Utilisateur(
   Id_Utilisateur COUNTER,
   Nom VARCHAR(50),
   Prénom VARCHAR(50),
   Poids SMALLINT,
   Taille SMALLINT,
   Date_naissance DATE,
   Thème_sombre_O_N LOGICAL,
   Mode_daltonien_O_N LOGICAL,
   Masquer_astuces_O_N LOGICAL,
   Mode_affichage_défaut VARCHAR(50),
   PRIMARY KEY(Id_Utilisateur)
);

CREATE TABLE Points_d_interet(
   Id_Points_d_interet COUNTER,
   Libelle VARCHAR(50),
   Description TEXT,
   PRIMARY KEY(Id_Points_d_interet)
);

CREATE TABLE Coordonnees(
   Id_Coordonnees COUNTER,
   Latitude VARCHAR(20),
   Longitude VARCHAR(20),
   PRIMARY KEY(Id_Coordonnees)
);

CREATE TABLE Activite(
   Id_Activite COUNTER,
   Discipline VARCHAR(50),
   Date_heure_debut DATETIME,
   Date_heure_fin DATETIME,
   Nom_activite VARCHAR(50),
   Nom_fichier VARCHAR(50),
   Favori_O_N LOGICAL,
   Distance REAL,
   Ascension_totale INT,
   Niveau_de_difficulte BYTE,
   Description TEXT,
   Frequence_cardiaque SMALLINT,
   Id_Utilisateur INT NOT NULL,
   PRIMARY KEY(Id_Activite),
   FOREIGN KEY(Id_Utilisateur) REFERENCES Utilisateur(Id_Utilisateur)
);

CREATE TABLE Associer(
   Id_Activite INT,
   Id_Label INT,
   PRIMARY KEY(Id_Activite, Id_Label),
   FOREIGN KEY(Id_Activite) REFERENCES Activite(Id_Activite),
   FOREIGN KEY(Id_Label) REFERENCES Label(Id_Label)
);

CREATE TABLE Situer(
   Id_Points_d_interet INT,
   Id_Coordonnees INT,
   PRIMARY KEY(Id_Points_d_interet, Id_Coordonnees),
   FOREIGN KEY(Id_Points_d_interet) REFERENCES Points_d_interet(Id_Points_d_interet),
   FOREIGN KEY(Id_Coordonnees) REFERENCES Coordonnees(Id_Coordonnees)
);

CREATE TABLE Agrementer(
   Id_Activite INT,
   Id_Points_d_interet INT,
   PRIMARY KEY(Id_Activite, Id_Points_d_interet),
   FOREIGN KEY(Id_Activite) REFERENCES Activite(Id_Activite),
   FOREIGN KEY(Id_Points_d_interet) REFERENCES Points_d_interet(Id_Points_d_interet)
);
";
try{
    $conn->exec($sql);
    echo "Table créée";
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>