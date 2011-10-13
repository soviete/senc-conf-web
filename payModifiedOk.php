<?php session_start(); ?>

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
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Llistat de persones registrades sense confirmació de pagament</h1>
                        <h3>Operació realitzada correctament</h3>  
                        
                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>
       