<?php

    ini_set('display_errors', 'On');
    error_reporting(-1);
    session_start();
    include 'mysql_connect.php';
    include 'include/common.php';

    if (empty ($_SESSION['sessionFree']) | empty ($_SESSION['sessionFree']) | empty ($_SESSION['name']) | empty ($_SESSION['surname'])
        | empty ($_SESSION['dni']) | empty ($_SESSION['email']) | empty ($_SESSION['type']))
        {           
            header ('Location:index.php');
        }

    else    
        {
            $sessionFree = $_SESSION['sessionFree'];
            $name = $_SESSION['name'];
            $surname = $_SESSION['surname'];
            $dni = $_SESSION['dni'];
            $email = $_SESSION['email'];
            $type = $_SESSION['type'];
            //print_r ($sessionFree);
        }
    
    
    
    //echo "$lang kkkkkkkkkk"; die;
    //CHECKS WHETHER THE USER IS ALREADY IN THE DB USING THE DNI AS KEY FIELD
    $result = mysql_num_rows(mysql_query("SELECT * FROM USERS WHERE dni='$dni'"));  

    
    if($result != 0) 
        {
            //echo "he passat per aqui";
            header ('Location:index.php');
        }
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Confirmacio de registre</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    
    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
            <?php include 'include/sessionValidation.php'; ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1><?php echo $langVoc['regDetails']; ?></h1>
<?php

    $query=mysql_query("INSERT INTO USERS (userName, surname, dni, email, type, paid, confirmed)
                                        VALUES ('$name', '$surname', '$dni', '$email', '$type', 'no', 'no')");

    $user=mysql_fetch_array(mysql_query("SELECT idUser FROM USERS WHERE dni='$dni'"));
    
    $confReg="";
    $confReserv="";
    
    foreach ( $sessionFree as $k=> $c) 
        {   
            
            $sessionName = "sessionName".$lang;
            
            if ($c == 1)
                {   
                    mysql_query("INSERT INTO REGISTERED (regIDUser, idRegSession) VALUES ('$user[0]','$k')");
                    
                    $query=mysql_fetch_array(mysql_query("SELECT $sessionName,
                                                          UNIX_TIMESTAMP(sessionDate),room FROM SESSIONS
                                                          WHERE idSESSIONS='$k'"));
                                        
                    $weekdaymysql=date("l",$query[1]);
                    $monthmysql=date("F",$query[1]);
                    $Day=date("d",$query[1]);
                    $year=date("Y",$query[1]);
                    $time=date("G",$query[1]);
                    $W=$day[$weekdaymysql];
                    $M=$month[$monthmysql];

                    $fecha="$W, $Day of $M $year";
                    $confReg.="$fecha<br><i>$query[2]</i><br>\"<b>$query[0]</b>\"<br><br>";
                }   

            else
                {
                    mysql_query("INSERT INTO RESERVED (regIDUser, idRegSession) VALUES ('$user[0]','$k')");
                    
                    $query=mysql_fetch_array(mysql_query("SELECT $sessionName,
                                                          UNIX_TIMESTAMP(sessionDate),room FROM SESSIONS
                                                          WHERE idSESSIONS='$k'"));
                    
                    $weekdaymysql=date("l",$query[1]);
                    $monthmysql=date("F",$query[1]);
                    $Day=date("d",$query[1]);
                    $year=date("Y",$query[1]);
                    $time=date("G",$query[1]);
                    $W=$day[$weekdaymysql];
                    $M=$month[$monthmysql];

                    $fecha="$W, $Day of $M $year";
                    $confReserv.="$fecha<br><i>$query[2]</i><br>\"<b>$query[0]</b>\"<br><br>";
                }
        }
        
        //echo "$confReserv----------";
        //echo "$confReg-----------";
        $subject = 'Inscripció al ciclo de conferències';
        $message ='<b>'.$name.'</b>, t\'has registrat correctament al cicle de
        conferències <i>El cervell envaeix la ciutat</i>.
        <p>Aquestes són les conferències a les quals t\'has inscrit:</p>
        '.$confReg.'
         <p>
         <p>Aquestes són les conferències a les quals t\'has inscrit:</p>
        '.$confReserv.'
         <p>
         Si us plau, confirmi la seva assistència almenys 5 dies abans de la data</p>
        '
        ;

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

        // Additional headers
        $headers .= 'From: Conferences <DONOTREPLY@elcervell.com>' . "\r\n";
        $headers .= "Reply-To: Conferences <INFO@elcervell.com>\r\n";
        $headers .= 'Return-Path: Conferences <INFO@elcervell.com>' . "\r\n";
        $headers .= "Organization: Sender Organization\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

        // Mail it
        //echo "HE enviat el mail";
        mail($email, $subject, $message, $headers);
        //header ('Location:confirmPartReg.php');
        echo'<p>';
                            echo $langVoc['congra'];
                            echo '<b>';
                            echo $name;
                            echo '</b>';
                            echo $langVoc['congra1']; 
                            echo '</p><p>';
                            echo $langVoc['congra2'];
                            echo '</p>'; 
?>

                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
        </div>
        <?php include 'include/footer.php'; ?>
    </body>
</html>
