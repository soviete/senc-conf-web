<?php
ini_set('display_errors', 'On');
error_reporting(-1);
session_start();
include 'include/common.php'
?>

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
            <?php include 'include/sessionValidation.php'; ?>
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
                        //echo "$lang =======\n";
                        $sessionFree;//Ary for keep which sessions have free places and which do not have
                        
                        //CHECKS WHETHER WE HAVE INFO FROM THE SESSIONS CHOSEN BY THE USER
                        if ($_SESSION['confs']) {
                            
                            $result = mysql_num_rows(mysql_query("SELECT * FROM USERS WHERE dni='$dni'"));
                            
                            //CHECKS WHETHER THE USER IS ALREADY IN THE DB USING THE DNI AS KEY FIELD
                            if($result == 1) {
                                
                                echo '<h3>ERROR!</h3>';
                                echo $langVoc['userRegistered'];
                                echo '<br>';
                                echo $langVoc['pleaseRetry'];       
                                echo '<a href=index.php>';
                                echo $langVoc['registration'];
                                echo '</a>';

                            }
                            
                            //THE USER IS NOT IN THE DB IS TIME TO SEE SESSION AVAILABILITY
                            else {
                                //Para cada uno de los que haya activado miramos si hay plazas
                                $switchFullSessions ="FALSE";
                                
                                foreach ( $_SESSION['confs'] as $k=> $c) 
                                    {
                                        if ($c == 'on') 
                                            {   
                                                //WE CHECK IF IN THE PICKED SESSION THERE IS FREE SLOTS
                                                $switch = freePlaces ($k, "CA12_14");
                                                
                                                if ($switch)
                                                    {
                                                        //echo "$switch===========\n";
                                                        $sessionFree[$k] = $switch;
                                                    }
                                                else
                                                    {
                                                        $sessionFree[$k] = 0;
                                                        $switchFullSessions ="TRUE";
                                                    }
                                                    
                                                                                                                                     
                                            }
                                    }
                                
                                echo "ooooooo";
                                print_r ($sessionFree);
                                echo "ooooooo";
                                
                                //IF ALL THE CHOSEN SESSIONS ARE AVAILABLE WE JUST INSERT THE USER IN THE DB AS REGISTERED, SEND THE MAIL AND SHOW CONGRATS    
                                if ($switchFullSessions == "FALSE")
                                    {
                                        $query=mysql_query("INSERT INTO USERS (userName, surname, dni, email, type, paid, confirmed)
                                                            VALUES ('$name', '$surname', '$dni', '$email', '$type', 'no', 'no')");
                                        $user=mysql_fetch_array(mysql_query("SELECT idUser FROM USERS WHERE dni='$dni'"));
                                        $conferences="";
                                        
                                        foreach ( $_SESSION['confs'] as $k=> $c) 
                                            {
                                            
                                                //sessionName field now has 3 languages
                                                $sessionName = "sessionName".$lang;

                                                if ($c == 'on') 
                                                    {
                                                        mysql_query("INSERT INTO REGISTERED (regIDUser, idRegSession)
                                                                     VALUES ('$user[0]','$k')");

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
                                                        $conferences.="$fecha<br><i>$query[2]</i><br>\"<b>$query[0]</b>\"<br><br>";
                                                    }
                                              }
                                    
                                        if (!$query or !$user) 
                                            {
                                                trigger_error ('Wrong QUERY: ' . mysql_error() );
                                            }
                                    
                                        else 
                                            {                                       
                                                //Msg in screen with congratulations for being registered
                                                echo'<p>';
                                                echo $langVoc['congra'];
                                                echo '<b>';
                                                echo $name;
                                                echo '</b>';
                                                echo $langVoc['congra1']; 
                                                echo '</p><p>';
                                                echo $langVoc['congra2'];
                                                echo '</p>';   

                                                $subject = 'Inscripció a ciclo de conferències';
                                                $message ='<b>'.$name.'</b>, t\'has registrat correctament al cicle de
                                                conferències <i>El cervell envaeix la ciutat</i>.
                                                <p>Aquestes són les conferències a les quals t\'has inscrit:</p>
                                                '.$conferences.'
                                                 <p>Si us plau, confirmi la seva assistència almenys 5 dies abans de la data</p>
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
                                                mail($email, $subject, $message, $headers);

                                            }
                                        }
                                    
                                    //THERE ARE FULL SESSION    
                                    else 
                                        {   
                                            //WE PRINT WHICH SESSIONS HAVE AVAILABILITY TO REGISTER
                                            //WHICH ONLY FOR RESERVE
                                            //AND A OK BUTTOM                                            
                                            echo '<h3>';
                                            echo $langVoc['partialSessionAva'];
                                            echo '</h3>';
                                            echo '<p align="justify">';
                                            echo $langVoc['session2RegMsg'];
                                            echo '</p>';
                                            $sessionName = "sessionName".$lang;
//                                            name='confs[$row[0]]]' /> &nbsp;<b>$row[1]</b>
//                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i>$fecha</i>
//                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i>$row[3]</i><br>
//                                            <br>"
                                            echo '<ul>';
                                            foreach ( $sessionFree as $k=> $c) 
                                                {   
                                                    //echo "$k";
                                                    if ($c == 1)
                                                        {
                                                            $query=mysql_fetch_array(mysql_query("SELECT $sessionName, UNIX_TIMESTAMP(sessionDate),room
                                                                                                  FROM SESSIONS
                                                                                                  WHERE idSESSIONS='$k'"));                                                            
//                                                            echo '<li>';
//                                                            echo $query[$sessionName]; echo '<br>';
                                                                
                                                            $D=date("d",$query[1]);
                                                            $M=date("n",$query[1]);
                                                            $Y=date("Y",$query[1]);
                                                            $fecha="$D $M $Y";
                                                            print "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>$query[$sessionName]</b>
                                                                   <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i>$fecha</i>
                                                                   <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i>$query[2]</i><br>
                                                                   <br>";                                                                                                                            
                                                        }   
                                                }                                            
                                            echo '<ul>';
                                            echo '<br>';
                                            echo '<p align="justify">';
                                            echo $langVoc['session2ReservMsg'];
                                            echo '</p>';             
                                            
                                            echo '<ul>';
                                            foreach ( $sessionFree as $k=> $c) 
                                                {   
                                                    //echo "$k";
                                                    if ($c == 0)
                                                        {
                                                            $query=mysql_fetch_array(mysql_query("SELECT $sessionName, UNIX_TIMESTAMP(sessionDate),room
                                                                                                  FROM SESSIONS
                                                                                                  WHERE idSESSIONS='$k'"));
//                                                            echo '<li>';
//                                                            echo $query[$sessionName]; echo '<br>';
                                                            $D=date("d",$query[1]);
                                                            $M=date("n",$query[1]);
                                                            $Y=date("Y",$query[1]);
                                                            $fecha="$D $M $Y";
                                                            print "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>$query[$sessionName]</b>
                                                                   <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i>$fecha</i>
                                                                   <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i>$query[2]</i><br>
                                                                   <br>";    
                                                        }   
                                                }                                            
                                            echo '<ul>';                                                                                            
                                            echo '</p>';
                                            
                                            echo $langVoc['acceptPartialReg'];
                                            
                                            //PASSING THE SESSIONS TO NEXT SCRIPT TO DO THE REGISTRATION/RESERVATION IF (HERE) OK BUTTOMS IS PRESS
                                            $_SESSION['sessionFree'] = $sessionFree;
                                            
                                            echo '<a href=partialReg.php>';                                            
                                            echo $langVoc['Here'];
                                            echo '</a>';
                                            
                                            //echo '<br>';
                                            //echo $langVoc['asap'];
                                        }
                                    
                                
                                    }
                            
                                }
                                
                                else 
                                    {
                                        //echo '<h3>ERROR!</h3>A field in the form is missing!<br>
                                        //Please <a href=index.php>Go back</a> and try again.';
                                        echo '<h3>ERROR!</h3>';
                                        echo $langVoc['noConfSelect'];
                                        echo '<br> Si us plau, torni a intentar-ho.
                                        <a href=ChooseConf.php>ENRERE</a>';
                                    }
                                
//                                $query=mysql_query("INSERT INTO USERS (userName, surname, dni, email, type)
//                                        VALUES ('$name', '$surname', '$dni', '$email', '$type')");
//                                $user=mysql_fetch_array(mysql_query("SELECT idUser FROM USERS WHERE dni='$dni'"));
//                                $conferences="";
//                                
//                                //If three of this sessions are full then bad luck my friend!
//                                $countFullSessions=0;
                                
                                    
                                    
//                                for ($i = 2; $i <= 5; $i++) 
//                                    {
//                                        $queryCount = mysql_query("select count(*) from formulario.REGISTERED WHERE formulario.REGISTERED.idRegSession = '$i'");
//                                        $count = mysql_fetch_array($queryCount);
//                                        
//                                        //$query="SELECT dni, userName, surname, email from SENCCONF.USERS WHERE SENCCONF.USERS.idUser IN (SELECT SENCCONF.REGISTERED.regIdUser FROM SENCCONF.REGISTERED WHERE SENCCONF.REGISTERED.idRegSession = '$idConference')";
//                                        echo $i;echo "=========="; echo "$count[0]"; echo "\n";
//                                        
//                                        if ($count[0] >= 10) 
//                                            {
//                                                $countFullSessions++;
//                                            }
//                                    }
//                                    
//                                echo "Number of session full $countFullSessions\n";
                                
                                    
                                    
                                //$countFullSessions =0;//CUIDADO CAMBIAR CUANDO ESTE DEBUGADO!!!!!!!!!!
                                
                                
                                
//                                if ($countFullSessions >= 1)
//                                    {
//                                        echo '<h3>ERROR!</h3>';
//                                        echo $langVoc['noSessionAva'];
//                                        echo '<br>';
//                                        echo $langVoc['waitList'];
//                                        echo '<a href=ChooseConf.php>';
//                                        echo $langVoc['Here'];
//                                        echo '</a>';
//                                        echo '<br>';
//                                        echo $langVoc['asap'];
//                                        
//                                        //include 'include/footer.php';
//                                        //break;
//                                    }
//                                
//                                else
//                                    {    
//                                        foreach ( $_SESSION['confs'] as $k=> $c) {
//                                            
//                                            //sessionName field now has 3 languages
//                                            $sessionName = "sessionName".$lang;
//                                            
//                                            if ($c == 'on') {
//                                            mysql_query("INSERT INTO REGISTERED (regIDUser, idRegSession)
//                                                         VALUES ('$user[0]','$k')");
//                                            $query=mysql_fetch_array(mysql_query("SELECT $sessionName,
//                                                                                  UNIX_TIMESTAMP(sessionDate),room FROM SESSIONS
//                                                                                  WHERE idSESSIONS='$k'"));
//                                            $weekdaymysql=date("l",$query[1]);
//                                            $monthmysql=date("F",$query[1]);
//                                            $Day=date("d",$query[1]);
//                                            $year=date("Y",$query[1]);
//                                            $time=date("G",$query[1]);
//                                            $W=$day[$weekdaymysql];
//                                            $M=$month[$monthmysql];
    //                                        foreach ($day as $key => $value) {
//                                            if ($value==$weekdaymysql) {
//                                                $W=$value;
//                                            }
//                                            }
//                                            foreach ($month as $key => $value) {
//                                            if ($value==$monthmysql) {
//                                                $M=$value;
//                                            }
//                                            }
//                                            $fecha="$W, $Day of $M $year";
//                                            $conferences.="$fecha<br><i>$query[2]</i><br>\"<b>$query[0]</b>\"<br><br>";
//                                        }
//                                    }
//                                    
//                                    if (!$query or !$user) {
//                                    trigger_error ('Wrong QUERY: ' . mysql_error() );
//                                    }
//                                    
//                                    else {
//                                        echo'<p>Enhorabona <b>',$name,'</b>!! T\'has registrat correctament </p>
//                                             <p>En breu rebràs un email amb la confirmació.</p>';
                                             
                                            //Msg in screen with congratulations for being registered
//                                            echo'<p>';
//                                            echo $langVoc['congra'];
//                                            echo '<b>';
//                                            echo $name;
//                                            echo '</b>';
//                                            echo $langVoc['congra1']; 
//                                            echo '</p><p>';
//                                            echo $langVoc['congra2'];
//                                            echo '</p>';   
//                                             
//                                            $subject = 'Inscripció a ciclo de conferències';
//                                            $message ='<b>'.$name.'</b>, t\'has registrat correctament al cicle de
//                                            conferències <i>El cervell envaeix la ciutat</i>.
//                                            <p>Aquestes són les conferències a les quals t\'has inscrit:</p>
//                                            '.$conferences.'
//                                             <p>Si us plau, confirmi la seva assistència almenys 5 dies abans de la data</p>
//                                            '
//                                            ;
//
//                                            // To send HTML mail, the Content-type header must be set
//                                            $headers  = 'MIME-Version: 1.0' . "\r\n";
//                                            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
//
//                                            // Additional headers
//                                            $headers .= 'From: Conferences <DONOTREPLY@elcervell.com>' . "\r\n";
//                                            $headers .= "Reply-To: Conferences <INFO@elcervell.com>\r\n";
//                                            $headers .= 'Return-Path: Conferences <INFO@elcervell.com>' . "\r\n";
//                                            $headers .= "Organization: Sender Organization\r\n";
//                                            $headers .= "X-Priority: 3\r\n";
//                                            $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
//
//                                            // Mail it
//                                            mail($email, $subject, $message, $headers);
//
//                                        }
//                                    }
//                                }
//                            }
//                            
//                            else {
//                                //echo '<h3>ERROR!</h3>A field in the form is missing!<br>
//                                //Please <a href=index.php>Go back</a> and try again.';
//                                echo '<h3>ERROR!</h3>';
//                                echo $langVoc['noConfSelect'];
//                                echo '<br> Si us plau, torni a intentar-ho.
//                                     <a href=ChooseConf.php>ENRERE</a>';
//                            }

                            ?>

                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
        </div>
        <?php include 'include/footer.php'; ?>
    </body>
</html>
