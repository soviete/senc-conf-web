<?php 
ini_set('display_errors', 'On');
error_reporting(-1);
session_start();
include 'include/common.php';
?>

<?php 
$sessionName=$_SESSION["sessionName"];
$fileName=$_SESSION["nameFile"];
//echo "+++++$sessionName\n";
//echo "======$fileName";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Generació de llistats</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>

    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <?php
                        print "<h1>Llistat de persones registrades a $sessionName</h1>";
                        print "<h3>L'arxiu s'ha generat correctament</h3>";
                        //$link="http://localhost/SENCCONFsvn/file/".$fileName;
                        $link="http://conferencias.senc.es/temp/".$fileName;
                        print "<div align='center'><a href=$link target='_blank'>BAIXAR L'ARXIU</a></div>";
                        print "<br><p>Per copiar l'arxiu prem el botó dret del teu ratolí, guardar l'arxiu com.</p><br><br>";

                        $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                        print "
                                        <div id='boxleft'>
                                                <input class='form_submitb' onclick='window.location.href=\"$url\"'type='button'
                                                       value=".$langVoc['back1']." />
                                                </div>";
                        //print "<form><input type='button' value='Download Now' onClick='$fileName></form>";//del
                        ?>

                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>
