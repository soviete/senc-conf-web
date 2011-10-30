<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';

$sessionId = $_SESSION['sessionId'];
$idUser = $_SESSION['idUser'];
$conferences = $_SESSION['conference'];
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
$query=mysql_fetch_array(mysql_query("SELECT $sessionName, UNIX_TIMESTAMP(sessionDate),room FROM SESSIONS WHERE idSESSIONS='$sessionId'"));
                                             $weekdaymysql=date("l",$query[1]);
                                             $monthmysql=date("F",$query[1]);
                                             $Day=date("d",$query[1]);
                                             $year=date("Y",$query[1]);
                                             $time=date("G",$query[1]);
                                             $W=$day[$weekdaymysql];
                                             $M=$month[$monthmysql];

                                             $fecha="$W, $Day $M $year";
                                             $conferences.="$fecha<br><i>$query[2]</i><br>\"<b>$query[0]</b>\"<br><br>";

$query = mysql_query ("DELETE from formulario.REGISTERED where REGISTERED.regIdUser = '$idUser' AND REGISTERED.idRegSession = '$sessionId'");

if (!$query) 
    {
        trigger_error ('Wrong QUERY: ' . mysql_error() );
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
                        <h1><?php echo "$conferences";?></h1>
                        <h3><?php echo $langVoc['confirmAsistTittle'];?></h3>
                        <p><?php echo $langVoc['confirmAsistMsgNo'];?></p>
                                             
                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>
