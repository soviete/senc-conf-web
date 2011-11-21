<?php
ini_set('display_errors', 'On');
error_reporting(-1);
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

// Set the database access information as constants:
//DEFINE ('DB_USER', 'gestor_formul');
//DEFINE ('DB_PASSWORD', '1q2w3e4r');
//DEFINE ('DB_HOST', 'conferencias.senc.es');
//DEFINE ('DB_NAME', 'formulario');

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'permeability789');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'formulario');

// Make the connection:
$connection = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
$db = mysql_select_db(DB_NAME,$connection);
mysql_query("SET NAMES 'utf8'");

if (!$connection) {
	trigger_error ('Could not connect to MySQL: ' . mysql_connect_error() );
}

#include 'mysql_connect.php';
//echo "$lang--------------";
$sessionName = "sessionName".$lang;
$query=mysql_fetch_array(mysql_query("SELECT $sessionName, UNIX_TIMESTAMP(sessionDate),room FROM SESSIONS WHERE idSESSIONS='$idSession'"));
                                             $weekdaymysql=date("l",$query[1]);
                                             $monthmysql=date("F",$query[1]);
                                             $Day=date("d",$query[1]);
                                             $year=date("Y",$query[1]);
                                             $time=date("G",$query[1]);
                                             $W=$day[$weekdaymysql];
                                             $M=$month[$monthmysql];
                                             $conference="";
                                             $fecha="$W, $Day $M $year";
                                             $conference.="$fecha<br><i>$query[2]</i><br>\"<b>$query[0]</b>\"<br><br>";

//$query = mysql_query ("DELETE from formulario.REGISTERED where REGISTERED.regIdUser = '$idUser' AND REGISTERED.idRegSession = '$sessionId'");
//
//if (!$query) 
//    {
//        trigger_error ('Wrong QUERY: ' . mysql_error() );
//    }

$query1 = mysql_query("INSERT INTO formulario.CONFIRMED (confIdUser, IdConfSession)
                       VALUES ('$idUser', '$idSession')");

if (!$query1) 
    {
        trigger_error ('Wrong QUERY: ' . mysql_error() );
    }

else 
    {
        // MAIL
        $subject = $langVoc['mailSubject3'];
        $message = $langVoc['mailConfYesA'].$name.$langVoc['mailConfYesB'].$langVoc['mailConfYesC'].$conference.$langVoc['mailConfYesD'].
                $langVoc['mailConfYesE'];


        mail($email, $subject, $message, $headers);
    }    
?>
    <body>
        <div  id="wrapper">
            <div id="contact">
                <p id="legal"><?php echo $langVoc['contact1'];?>
                <a href="mailto:bioinfodesigning@gmail.com?subject=Feedback" >bioinfodesigning@gmail.com</a></p>
            
            </div>
        <div id="header">
        <div id="logo">
            <h1><a href="index.php"><?php echo $langVoc['conferenceReg'];?></a></h1>
            <h2><a href="index.php">"El Cervell Envaeix la Ciutat"</a></h2>
        </div>
        </div>
        <link rel="shortcut icon" href="images/favicon.ico">
            <?php 
//            include 'include/header.php'; 
            ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1><?php echo "$conference";?></h1>
                        <h3><?php echo $langVoc['confirmAsistTittle'];?></h3>
                        <p><?php echo $langVoc['confirmAsistMsgYes'];?></p>
                                             
                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>