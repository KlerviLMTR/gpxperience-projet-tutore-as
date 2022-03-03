<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPXperience - Activités</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Images/icone.ico"/>
    <link rel="stylesheet" href="../CSS-SCSS/template.css">
    <link rel="stylesheet" href="../CSS-SCSS/polices.css">
    <link rel="stylesheet" href="../CSS-SCSS/Activités.css">
</head>
<body>
    <?php
     
        session_start();
        include_once('utils.php');
        $linkpdo = connect();

        if(!isset($_SESSION['login'])){
            header('Location: login.php');
        }
        $id = $_SESSION['id'];

        $query = 'SELECT DISTINCT activite.* FROM utilisateur, activite WHERE activite.id_uti = '.$id.' ;';    
        $result = query($linkpdo,$query);

        

    ?>

    <!-- JAVASCRIPT -->

    <script>
        
        function sleep(ms){
            return new Promise(resolve => setTimeout(resolve,ms));
        }

        async function toggle_menu(){
            console.log("coucou");
            let state_menu = document.getElementById("menu").style.flex;

            let img = document.getElementById("menu_button");
            console.log(state_menu);
            

            if(state_menu == "0.25 1 0%"){

                img.style.transform="rotate(0deg)";
                document.getElementById("menu").style.flex =0.80;
                await sleep(199);

                document.getElementById("parametres").innerText="Paramètres";
                document.getElementById("parametres").style.flex=2;
                await sleep(100);

                document.getElementById("aide").innerText="Aide";
                document.getElementById("aide").style.flex=2;
                await sleep(80);
                
                document.getElementById("activites").innerText="Activités";
                document.getElementById("activites").style.flex=2;
                await sleep(60);
            }
            else {
               // img.style.transform="rotate (180deg)";
               img.style.transform="rotate(180deg)";
                document.getElementById("menu").style.flex =0.25;

                document.getElementById("activites").innerText=null;
                document.getElementById("activites").style.flex=0;
                await sleep(100);

                document.getElementById("aide").innerText=null;
                document.getElementById("aide").style.flex=0;
                await sleep(200);

                document.getElementById("parametres").innerText=null;
                document.getElementById("parametres").style.flex=0;
                await sleep(250);

            }
        }
        var count=0;
        let chk = document.getElementsByClassName("js_checkbox");

        function partager(){
            let grid = document.getElementsByClassName("grid_row");
            let expImg = document.getElementById("js_export_img");

            console.log(grid);

            if(count==0){
                expImg.style.visibility="visible";
                for(let element of grid){
                    element.style.gridTemplateColumns="9% 9% 19% 5% 5% 9% 9% 10% 10% 10% 5%";
                    console.log(element)
                    count=1;
                }
                for(let element of chk){
                    element.style.visibility="visible";
                }
            }
            else{
                expImg.style.visibility="hidden";
                for(let element of grid){
                    element.style.gridTemplateColumns="10% 10% 20% 5% 5% 10% 10% 10% 10% 10% 0%";
                    console.log(element)
                    count=0;
                }
                for(let element of chk){
                    element.style.visibility="hidden";
                }
            }

        }
        function check_verif(){
            var check_count=0;
            let expImg = document.getElementById("js_export_img")
            for(let element of chk){
                if(element.checked == true){
                    check_count++;
                }
            }
            console.log(check_count);

            if(check_count!=0){
                
                expImg.style.pointerEvents="auto";
                expImg.style.cursor="pointer";
  
                expImg.style.backgroundImage ="url(../Images/Attribution_non_requise/export-share-active.svg)";
            }
            else{

                expImg.style.backgroundImage = "url(../Images/Attribution_non_requise/export-share.svg)"
            }
        }

    </script>


    <!-- FIN JAVASCRIPT -->

    <header>
        <a href="Activités.php" id="logo">
            <img src="../Images/Creations_svg/Logo%20GPXperience_texteVect.svg"  alt="Logo GPXperience">
        </a>

        <div id="menu_container">

            <a href="Profil.php" class = "menu_buttons">
                <img src="../Images/Attribution_requise/utilisateur.svg" class="menu_icons" alt="Profil utilisateur logo">
                <p>Profil</p>
            </a>


            <a href="login.php" class="menu_buttons">
                <img src="../Images/Attribution_non_requise/logout.svg" class="menu_icons" alt="Se déconnecter logo">
                <p>Se déconnecter</p>
            </a>
        </div>

    </header>

    <main>
        <menu id="menu">
            <h2>Menu : </h2>
            <ul id="menu_ul">
                <li class="menu_tabs" id="tab1" >
                    <div class="bg_li_border_left"></div>
                    <div class="li_border_left"></div>
                    <a href="./Activités.php">
                        <img src="../Images/Attribution_non_requise/flag-outline.svg" alt="icône activités">
                        <p id="activites">Activités</p>
                    </a>
                </li>

                <li class="menu_tabs" id="tab2" >
                    <div class="bg_li_border_left"></div>
                    <div class="li_border_left"></div>
                    <a href="./Aide.php">
                        <img src="../Images/Attribution_non_requise/help.svg" alt="icône aide">
                        <p id="aide">Aide</p>
                    </a>
                </li>

                <li class="menu_tabs" id="tab3" >
                    <div class="bg_li_border_left"></div>
                    <div class="li_border_left"></div>
                    <a href="./Parametres.php">
                        <img src="../Images/Attribution_non_requise/settings.svg" alt="icône paramètres">
                        <p id="parametres">Paramètres</p>
                    </a>
                </li>

                <li class="menu_tabs">

                </li>
            </ul>
            
            <button onclick="toggle_menu()">
                <img src="../Images/Attribution_non_requise/close-menu.svg" id="menu_button"alt="icône fermeture menu">
            </button>

        </menu>


        <!-- Contenu principal de la page -->
        <div id="mid_container">

            <!-- En tête du corps principal -->
            <div id="main_container">
                <h1>Activités</h1>
                <hr>
                

                <div id="function_container">
                    <form action="" method="POST">
                        <h2>Rechercher par mots-clés :</h2>
                        <input type="text" placeholder="🔎︎ Recherche">
                        <input type="submit" value="✓" id="apply_filters">
                        <input type="submit" value="✘" id="erase_filters">
                    </form>

                    <div id="main_functions">
                        <button>
                            <img src="../Images/Attribution_non_requise/add.svg" alt="icône d'ajout d'activités">
                        </button>
                        <p id="upload_activity">Importer une activité</p>
                        
                        <button onclick="partager()">
                            <img src="../Images/Attribution_non_requise/share-round-line.svg" alt="icône de partage d'activités">
                        </button>
                        <p id="share_activity">Partager une activité </p>    
                          
                    </div>
            </div>


                <!-- corps principal -->
                <form method="post" id="grid_container">
                    <div class="grid_row" id="grid_title">
                        <div class="grid_col"><h3>Discipline</h3></div>
                        <div class="grid_col">
                            <img src="../Images/Attribution_non_requise/triangle-bottom-arrow.svg" alt="icône tri">
                            <h3>Date</h3>     
                        </div>
                        <div class="grid_col">
                            <img src="../Images/Attribution_non_requise/triangle-bottom-arrow.svg" alt="icône tri">
                            <h3>Nom</h3>                         
                        </div>
                        <div class="grid_col">
                            <img src="../Images/Attribution_non_requise/favorite.svg" class="grid_icons" alt="icône tri">
                        </div>
                        <div class="grid_col">
                            <img src="../Images/Creations_svg/crea_klervi_label.svg" id="label_icon" class="grid_icons" alt="icône label">
                        </div>

                        <div class="grid_col">
                            <img src="../Images/Attribution_non_requise/triangle-bottom-arrow.svg" alt="icône tri">
                            <h3>Distance</h3>      
                        </div>
                        <div class="grid_col">
                            <img src="../Images/Attribution_non_requise/triangle-bottom-arrow.svg" alt="icône tri">
                            <h3>Durée</h3>
                        </div>
                        <div class="grid_col">
                            <img src="../Images/Attribution_non_requise/triangle-bottom-arrow.svg" alt="icône tri">
                            <h3>Vitesse moyenne</h3>
                        </div>
                        <div class="grid_col">
                            <img src="../Images/Attribution_non_requise/triangle-bottom-arrow.svg" alt="icône tri">
                            <h3>Ascension totale</h3>
                        </div>
                        <div class="grid_col">
                            <img src="../Images/Attribution_non_requise/triangle-bottom-arrow.svg" alt="icône tri">
                            <h3>Difficulté</h3>
                        </div>
                        <div>
                            <input type="submit" id="js_export_img" value="">
                        </div>
                    </div>

                        <?php

                        $count=0;
                        
                            foreach($result as $key=>$row){

                                if($key<8){
                                    $discipline = $row['discipline'];
                                    $date_act = $row['date_act'];
                                    $nom_act = $row['nom_act'];
                                    $favori_act = $row['favori_act'];
                                    $label_acte = $row['label_act'];
                                    $distance_acte = $row['distance_act'];
                                    $duree_act = $row['duree_act'];
                                    $vitesse_act = $row['vitesse_act'];
                                    $ascension_act = $row['ascension_act'];
                                    $difficulte_act = $row['difficulte_act'];
                                    
                                    echo '<div class="grid_row">';
                                
                                    echo'<div class="grid_col"><p>'.$discipline.'</p></div>';
                                    echo'<div class="grid_col"><p>'.$date_act.'</p></div>';
                                    echo'<div class="grid_col"><p>'.$nom_act.'</p></div>';
                                    echo'<div class="grid_col"><p>'.$favori_act.'</p></div>';
                                    echo'<div class="grid_col"><p>'.$label_acte.'</p></div>';
                                    echo'<div class="grid_col"><p>'.$distance_acte.'</p></div>';
                                    echo'<div class="grid_col"><p>'.$duree_act.'</p></div>';
                                    echo'<div class="grid_col"><p>'.$vitesse_act.'</p></div>';
                                    echo'<div class="grid_col"><p>'.$ascension_act.'</p></div>';
                                    echo'<div class="grid_col"><p>'.$difficulte_act.'</p></div>';
                                    
        
                                    echo'<div class="select_activity">
                                    <input type="checkbox" class="js_checkbox" onclick="check_verif()">
                                    </div>';
        
                                    echo'</div>';
                                }
                            }
                                

                                
                        
                        ?>
                </form>
            </div>
        </div>


    </main>

    <footer>
        <a href="Mentions_legales.php">Mentions légales</a>
        <a href="Sources.php">Sources des images</a>
        <a href="Aide.php">FAQ</a>
    </footer>
    
</body>
</html>