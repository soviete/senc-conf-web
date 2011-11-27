<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';

if(isSet($_GET['id'])) {
    $id = $_GET['id'];

    // register the session and set the cookie
    $_SESSION['id'] = $id;

    setcookie('id', $id, time() + (3600 * 24 * 30));
}

$id=2;
$key = "100";
$idEn = encrypt ($id, $key);
echo "$idEn============";
$iddec=decrypt($idEn, $key);
echo "$iddec============";
$sessionId = 2;
$idUser = 2;

//HACER QUE SOLO SE HABRA CUANDO VENGA DEL MAIL
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

$query1 = mysql_query("select formulario.USERS.lang from formulario.USERS WHERE formulario.USERS.idUser = '$idUser'");
$row = mysql_fetch_array($query1);
$lang = $row[0];

$sessionName = "sessionName".$lang;

//Viene del idioma del usuario si cambia no le va a cambiar el idioma
echo "$sessionName+++++++++";
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

$_SESSION['sessionId'] = $sessionId;
$_SESSION['idUser'] = $idUser;
$_SESSION['conference'] = $conferences;
//echo "$sessionName ====== $conferences------------";

//$row = mysql_fetch_array($queryCount);
//$sessionName = $row[0];


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
                        <h3><?php echo $langVoc['placeAvailable'];?></h3>
                        <h3><?php //echo $langVoc['confirmAsistTittle'];?></h3>
                        
                        <p><?php echo $langVoc['placeAvailableText'];
                                 echo ' <b>';
                                 echo $query[0];
                                 echo '</b>. ';?>
                        <?php echo $langVoc['placeAvailableGetPlace'];?></p>

                        <form name="list" action="getFreePlacesYes.php" method="post">
                            <div align="center">
                                <input class="form_submitb" type="submit" name="submit" value="SI" />
                            </div><br><br>
                        </form>
                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
