<?php 
//session_start(); //it is an include session start has been already made
ini_set('display_errors', 'On');
error_reporting(-1);
include 'include/common.php';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Proteins Structure in Diseases</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>

            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Gestió de confirmacions</h1>
                        <h3><?= $_SESSION['error'] ?>
			</h3>
			<p> <a href=gestio.php> TORNAR </a> al registre de l'àrea de gestió.</p>
                    </div>
                </div>
<!--                <div id="sidebar">
                    <ul>
                        
                    </ul>
                </div>-->
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>


