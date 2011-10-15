<?php
ini_set('display_errors', 'On');
error_reporting(-1);
session_start();
include 'include/common.php';
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulari d'inscripció a conferències</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Gestió de confirmacions</h1><br>
<!--                        <h3>Si us plau, empleneu i envieu el següents camps:</h3>-->                        
            
                        <ul>
                            <?php 
                            
                                //if ($_SESSION['valid'] != 'YES' | !$_SESSION['Name'] ) {

                                echo '<h3>Si us plau introduïu usuari i contrasenya:</h4><br><br>
                                <form name="login" action="login.php" method="post">
                                <div id="UILabel">Usuari*</div><input class="form_tfield" type="text" name="user" value="" />
                                <div id="UILabel">Contrasenya*</div><input class="form_tfield" type="password" name="pass" value="" />
                                <br><br><div align="center">
                                <input class="form_submitb" type="submit" name="submit" value="Login" />
                                </div>
                                <div id="note">
                                <small>*Camps obligatoris</small>
                                </div>
                                </form>';

                            //}

                            //else{
                            //	echo   '<br><h4>Hello ',".$_SESSION['Name'].",'!</h4><br><br>';

                            //        echo   '<br><h4 align="left">Hello '.$_SESSION['Name'].'.<br>You are now logged in</h4>
                            //        <h4 align="right"><a href="logout.php">Log out</a></h4>';
                            //}
                            ?>
                        </ul>
            
            
            
            
            
                    </div>
                </div>
<!--                <div id="sidebar">
                    <ul>
                        
                    </ul>
                </div>-->
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>

