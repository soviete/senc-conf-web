<?php
ini_set('display_errors', 1);
error_reporting(E_ALL|E_STRICT);
session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Confirmacio de registre</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>

    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>DETALLS D'INSCRIPCION</h1>
                        <?php
                        include 'mysql_connect.php';
                        $name = $_SESSION['name'];
                        $surname = $_SESSION['surname'];
                        $dni = $_SESSION['dni'];
                        $email = $_SESSION['email'];
                        $type = $_SESSION['type'];
                        if ($_POST['confs']) {
                            $result = mysql_num_rows(mysql_query("SELECT * FROM USERS WHERE dni='$dni'"));
                            if($result == 1) {
                                //echo '<h3>ERROR!</h3>The username you have chosen already exists!<br>
                                //Please <a href=index.php>Go back</a> and try another Username';
                                echo '<h3>ERROR!</h3>Aquest usuari ja està registrat!<br>
                                    Si us plau, torni a intentar-ho.   <a href=index.php>INSCRIPCIÓ</a>';

                            }
                            else {
                                $query=mysql_query("INSERT INTO USERS (userName, surname, dni, email, type)
                                        VALUES ('$name', '$surname', '$dni', '$email', '$type')");
                                $user=mysql_fetch_array(mysql_query("SELECT idUser FROM USERS WHERE dni='$dni'"));
                                foreach ( $_POST['confs'] as $k=> $c) {
                                    if ($c == 'on') {
                                        mysql_query("INSERT INTO REGISTERED (regIDUser, idRegSession)
                                                VALUES ('$user[0]','$k')");
                                    }
                                }
                                if (!$query or !$user) {
                                    trigger_error ('Wrong QUERY: ' . mysql_error() );
                                }
                                else {
                                    echo'<p>Enhorabona <b>',$name,'</b>!! T\'has registrat correctament </p>
                                        <p>En breu rebràs un email amb la confirmació.</p>';
                                    $subject='Registre a conferències';
                                    $message='CULO, te has registrado correctamente!!';
                                    mail($email, $subject, $message);
                                }
                            }
                        }
                        else {
                            //echo '<h3>ERROR!</h3>A field in the form is missing!<br>
                            //Please <a href=index.php>Go back</a> and try again.';
                            echo '<h3>ERROR!</h3>No has seleccionat cap conferèncie<br> Si us plau, torni a intentar-ho.
                                <a href=ChooseConf.php>ENRERE</a>';
                        }

                        ?>

                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
        </div>
        <?php include 'include/footer.php'; ?>
    </body>
</html>
