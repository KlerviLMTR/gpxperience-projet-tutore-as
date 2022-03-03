<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPXperience - Mentions légales</title>
    <link rel="shortcut icon" type="image/x-icon" href="../Images/icone.ico"/>
    <link rel="stylesheet" href="../CSS-SCSS/template.css">
    <link rel="stylesheet" href="../CSS-SCSS/polices.css">
    <link rel="stylesheet" href="../CSS-SCSS/Profil.css">
</head>
<body>
        <?php
            
            session_start();
            include_once('utils.php');
            $linkpdo = connect();

            if(!isset($_SESSION['login'])){
                header('Location: login.php');
            }

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
                    element.style.gridTemplateColumns="10% 10% 10% 5% 5% 10% 10% 15% 15% 5% 5%";
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
                    element.style.gridTemplateColumns="10% 10% 10% 5% 5% 10% 10% 15% 15% 10% 0%";
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

        <div id="mid_container">
            <div id="main_container">
                <h1>Mentions légales</h1>
                <hr>
            </div>
        </div>

    </main>

    <footer>
        <a href="./Mentions_legales.php">Mentions légales</a>
        <a href="./Sources.php">Sources des images</a>
        <a href="./Aide.php">FAQ</a>
    </footer>
    
</body>
</html>