<?php
ini_set('display_errors', 'On');
error_reporting(-1);
session_start();
include 'include/common.php';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Confirmacio de registre</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>

    <div id="lang">
        <ul>
            <li><a href="AddUser.php?lang=ca">cat</a></li>
            <li><a href="AddUser.php?lang=es">esp</a></li>
            <li><a href="AddUser.php?lang=en"">eng</a></li>
        </ul>
    </div>

    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1><?php echo $langVoc['regDetails']; ?></h1>
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
                                $conferences="";
                                foreach ( $_POST['confs'] as $k=> $c) {
                                    if ($c == 'on') {
                                        mysql_query("INSERT INTO REGISTERED (regIDUser, idRegSession)
                                                VALUES ('$user[0]','$k')");
                                        $query=mysql_fetch_assoc(mysql_query("SELECT sessionName,UNIX_TIMESTAMP(sessionDate) FROM SESSIONS WHERE
                                        idSESSIONS='$k'"),MYSQL_NUM);
                                        $weekdaymysql=date("l",$query[1]);
                                        $monthmysql=date("F",$query[1]);
                                        $Day=date("d",$query[1]);
                                        $year=date("Y",$query[1]);
                                        $time=date("G",$query[1]);
                                        foreach ($day as $key => $value) {
                                            if ($value==$weekdaymysql) {
                                                $W=$value;
                                            }
                                        }
                                        foreach ($month as $key => $value) {
                                            if ($value==$monthmysql) {
                                                $M=$value;
                                            }
                                        }
                                        $fecha="$W, $Day of $M $year";
                                        $conferences.="$fecha<br>\"<b>$query[0]</b>\"<br><br>";
                                    }
                                }
                                if (!$query or !$user) {
                                    trigger_error ('Wrong QUERY: ' . mysql_error() );
                                }
                                else {
//                                    $conferences=print_r(mysql_fetch_array(mysql_query("SELECT sessionName FROM
//                                            SESSIONS WHERE idSESSIONS IN (SELECT idRegSession FROM REGISTERED
//                                            WHERE regIdUser = '$user[0]'")));

                                    echo'<p>Enhorabona <b>',$name,'</b>!! T\'has registrat correctament </p>
                                        <p>En breu rebràs un email amb la confirmació.</p>';
                                    $subject = 'Inscripció a ciclo de conferències';
                                    $message ='
                                    <html>
                                    <head>
                                      <title> <b>'.$name.'</b>, t\'has registrat correctament al cicle de
                                    conferències <i>El cervell envaeix la ciutat<\i>.</title>
                                    </head>
                                    <body>
                                      <p>Aquestes són les conferències a les quals t\'has inscrit:</p>
                                      '.$conferences.'
                                      <p>Si us plau, confirmi la seva assistència almenys 5 dies abans de la data</p>
                                    </body>
                                    </html>
                                    '
                                    ;

// To send HTML mail, the Content-type header must be set
                                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
                                    $headers .= 'From: Recordatori <DONOTREPLY@elcervell.com>' . "\r\n";

// Mail it
                                    mail($email, $subject, $message, $headers);

                                }
                            }
                        }
                        else {
                            //echo '<h3>ERROR!</h3>A field in the form is missing!<br>
                            //Please <a href=index.php>Go back</a> and try again.';
                            echo '<h3>ERROR!</h3>';
                            echo $langVoc['noConfSelect'];
                            echo '<br> Si us plau, torni a intentar-ho.
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
