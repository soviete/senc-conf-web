<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';

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
                        <h3><?php echo $langVoc['confirmAsistTittle'];?></h3>

                        <p><?php echo $langVoc['confirmAsistSI'];?></p>

                        <form name="list" action="saveConfirmYes.php" method="post">
                            <div align="center">
                                <input class="form_submitb" type="submit" name="submit" value="SI" />
                            </div><br><br>
                        </form>

                        <h3><?php echo $langVoc['confirmAsistTittleNO'];?></h3>
                        <p><?php echo $langVoc['confirmAsistNO'];?></p>
                        <form name="list" action="saveConfirmNo.php" method="post">
                            <div align="center">
                                <input class="form_submitb" type="submit" name="submit" value="NO" />
                            </div>
                        </form><br><br>
<!--                        <div id='boxleft'>
                            <input class="form_submitb"type="button" onclick='window.location.href="gestio.php"'
                                   value="<?php //echo $langVoc['back1']; ?>">
                        </div>-->

                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>

