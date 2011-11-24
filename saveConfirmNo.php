<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';
$key = "33";

if(isSet($_GET['idUser'])) {
    $idUserEncrypt = $_GET['idUser'];
    $idUser = decrypt($idUserEncrypt, $key);
}

if(isSet($_GET['idSession'])) {
    $idSessionEncrypt = $_GET['idSession'];
    $idSession = decrypt($idSessionEncrypt, $key);
}

if(isSet($_GET['lang'])) {
    $langEncrypt = $_GET['lang'];
    $lang = decrypt($langEncrypt, $key);
}

if(isSet($_GET['name'])) {
    $nameEncrypt = $_GET['name'];
    $name = decrypt($nameEncrypt, $key);
}

if(isSet($_GET['email'])) {
    $emailEncrypt = $_GET['email'];
    $email = decrypt($emailEncrypt, $key);
}

// MAIL HEADERS
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Additional headers
$headers .= 'From: El Cerebro Invade la Ciudad <DONOTREPLY@elcervell.com>' . "\r\n";
$headers .= "Reply-To: El Cerebro Invade la Ciudad <INFO@elcervell.com>\r\n";
$headers .= 'Return-Path: El Cerebro Invade la Ciudad <INFO@elcervell.com>' . "\r\n";
$headers .= "Organization: Sender Organization\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;
//echo "$conferences--------------";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestió xerrades</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>

<?php
$currentPage=currentPage();
print "
<div id='lang'>
<a href='$currentPage?lang=ca'>CAT</a></li>
<a href='$currentPage?lang=es'>ESP</a></li>
<a href='$currentPage?lang=en'>ENG</a></li>
</div>";

include 'mysql_connect.php';

$sessionName = "sessionName".$lang;
$query=mysql_fetch_array(mysql_query("SELECT $sessionName, UNIX_TIMESTAMP(sessionDate),room FROM SESSIONS WHERE idSESSIONS='$idSession'"));
                                             $weekdaymysql=date("l",$query[1]);
                                             $monthmysql=date("F",$query[1]);
                                             $Day=date("d",$query[1]);
                                             $year=date("Y",$query[1]);
                                             $time=date("G",$query[1]);
                                             $W=$day[$weekdaymysql];
                                             $M=$month[$monthmysql];

                                             $fecha="$W, $Day $M $year";
                                             $conference.="$fecha<br><i>$query[2]</i><br>\"<b>$query[0]</b>\"<br><br>";
                                             
$result = mysql_num_rows( mysql_query("SELECT  confIdUser FROM formulario.CONFIRMED WHERE CONFIRMED.confIdUser = '$idUser' AND CONFIRMED.idConfSession = '$idSession'"));

if ($result == 0) 
    {   
        
        $result1 = mysql_num_rows( mysql_query("SELECT  regIdUser FROM formulario.REGISTERED WHERE REGISTERED.regIdUser = '$idUser' AND REGISTERED.idRegSession = '$idSession'"));
        
        $query = mysql_query ("DELETE from formulario.REGISTERED where REGISTERED.regIdUser = '$idUser' AND REGISTERED.idRegSession = '$idSession'");

        //if (!$query)
        //    {
        //        trigger_error ('Wrong QUERY: ' . mysql_error() );
        //    }
        //else
        //    {
        
        if ($result1 == 0)
            {
                //echo "usuario previamente borrado";
            }
        else
            {
                // MAIL
                $subject = $langVoc['mailSubject6'];
                $message = $langVoc['mailConfNoA'].$name.$langVoc['mailConfNoB'].$langVoc['mailConfNoC'].
                $conference.$langVoc['mailConfNoD'].
                        $langVoc['mailConfNoE'];


                mail($email, $subject, $message, $headers);
            }
                
        print "<body>
               <div  id='wrapper'>
                <div id='contact'>
                    <p id='legal'>";
        echo $langVoc['contact1'];
        print "<a href='mailto:bioinfodesigning@gmail.com?subject=Feedback' >bioinfodesigning@gmail.com</a></p>

                </div>
            <div id='header'>
            <div id='logo'>
                <h1><a href='index.php'>";
       echo $langVoc['conferenceReg'];
       print "</a></h1>
                <h2><a href='index.php'>\"El Cervell Envaeix la Ciutat\"</a></h2>
            </div>
            </div>
            <link rel='shortcut icon' href='images/favicon.ico'>";

    //            include 'include/header.php';
       print "<div id='page'>
                    <div id='content'>
                        <div id='welcome'>
                            <h1>";
       echo "$conference";
       print"</h1>
             <h3>";
       echo $langVoc['confirmAsistTittle'];
       print"</h3>
             <p>";
       echo $langVoc['confirmAsistMsgNo'];
       print "</p>
              </div>
                    </div>
                    <div style=' clear: both; height: 1px'></div>
                </div>";
       include 'include/footer.php';
       print "</div>
              </body>
              </html>";
    }
    
 //Ya habia confirmado previamente   
 else 
    {
        print "<body>
               <div  id='wrapper'>
                <div id='contact'>
                    <p id='legal'>";
        echo $langVoc['contact1'];
        print "<a href='mailto:bioinfodesigning@gmail.com?subject=Feedback' >bioinfodesigning@gmail.com</a></p>

                </div>
            <div id='header'>
            <div id='logo'>
                <h1><a href='index.php'>";
       echo $langVoc['conferenceReg'];
       print "</a></h1>
                <h2><a href='index.php'>\"El Cervell Envaeix la Ciutat\"</a></h2>
            </div>
            </div>
            <link rel='shortcut icon' href='images/favicon.ico'>";

    //            include 'include/header.php';
       print "<div id='page'>
                    <div id='content'>
                        <div id='welcome'>
                            <h1>";
       echo "$conference";
       print"</h1>
             <h3>";
       echo $langVoc['confirmAsistTittle'];
       print"</h3>
             <p>";
       echo $langVoc['confirmAsistAlreadyConf'];
       print "</p>
              </div>
                    </div>
                    <div style=' clear: both; height: 1px'></div>
                </div>";
       include 'include/footer.php';
       print "</div>
              </body>
              </html>";
    }
?>