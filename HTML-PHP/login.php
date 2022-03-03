<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
        session_start();
        include_once('utils.php');
        $linkpdo = connect();

        if(isset($_SESSION['login'])){
            session_destroy();
        }

        if(isset($_POST['login']) && isset($_POST['password'])){
            $login = $_POST['login'];
            $password = $_POST['password'];
            $query = 'SELECT * FROM utilisateur WHERE login = "'.$login.'" AND password = "'.$password.'" ;';

            
            $result = query($linkpdo,$query);

            foreach($result as $ligne){
                echo $ligne['login']."<br>";
                echo $ligne['password']."<br>";

                $_SESSION['login'] = $ligne['login'];
                $_SESSION['password'] = $ligne['password'];
                $_SESSION['id'] = $ligne['id_uti'];

                if(!empty($_SESSION['login'])){
                    header('Location: Activités.php');
                }

            }

            // $_SESSION['login'] = $login;
            // $_SESSION['password'] = $password;

        }

        

    ?>

    <form action="login.php" method="post">
        <label for="login">login </label>
        <input type="text" name="login" id=""> <br>

        <label for="password">password </label>
        <input type="password" name="password" id=""> <br>

        <input type="submit" value="Connexion">
    </form>
</body>
</html>