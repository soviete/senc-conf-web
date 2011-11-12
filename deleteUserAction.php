<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';

// Getting variable from post form if any.

if ($_SESSION['dni']) {
        
    $dni=$_SESSION['dni'];
    $empty="NO";
    
    }

else {
    header("Location: index.php");
}

include 'include/formvalidation.php';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulari d'inscripció a conferències</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>

    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1><?php echo "Esborrar usuaris de la base de dades"; ?></h1><br>
<!--                        <form action="deleteUserAction.php" method="post">-->
                            <?php
                            include 'mysql_connect.php';
                            echo '<h3>';
                            echo "Confirmació de l'element a esborrar";
                            echo '</h3><br>';
                            // Handling errors and printing text
                            switch ($empty) {
                                case "YES":
                                    echo $langVoc['emptyfield'];
                                    break;
                                case "NO";
                                    
                                    if (!validNum($dni)) {
                                        echo $langVoc['dniError'];
                                    }
                                    
                                    else {
                                        
                                        $queryId = "SELECT idUser from formulario.USERS WHERE dni='$dni'";
                                        $result = mysql_query($queryId);
                                        $resultId= mysql_fetch_array ($result);
                                        $idUser = $resultId['idUser'];
                                                                                                                        
                                        $queryDel1=mysql_query("DELETE FROM formulario.REGISTERED WHERE  regIdUser = '$idUser'");
                                        
                                        if (!$queryDel1) {
                                                trigger_error ('Wrong QUERY REGISTERED: ' . mysql_error() );
                                             }
                                             
                                        $queryDel2=mysql_query("DELETE FROM formulario.CONFIRMED WHERE  confIdUser = '$idUser'");
                                        
                                        if (!$queryDel2) {
                                                trigger_error ('Wrong QUERY CONFIRMED: ' . mysql_error() );
                                             }
                                        
                                        $queryDel3=mysql_query("DELETE FROM formulario.RESERVED WHERE  reservIdUser = '$idUser'");
                                        
                                        if (!$queryDel3) {
                                                trigger_error ('Wrong QUERY RESERVED: ' . mysql_error() );
                                             }
                                             
                                        $queryDel4=mysql_query("DELETE FROM formulario.USERS WHERE  dni = '$dni'");
                                        
                                        if (!$queryDel4) {
                                                trigger_error ('Wrong QUERY DELETE: ' . mysql_error() );
                                             }
                                             
                                        print "<p align='justify'>"."Usuari esborra't correctament!"."</p>";
                                        
                                        print "<br><br><div id='boxleft'>
                                                <input class='form_submitb' onclick='window.location.href=\"admin.php\"'type='button'
                                                       value="."Tornar"." />
                                                </div>";                                       
                                    }
                                    break;
                            }
                            ?>
                        </form>
                        <br>
                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>
