<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestió xerrades</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>

    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Gestió de conferències</h1>
                        <h3>Llistat d'assistència</h3>

                        <p>Si vols veure quines persones han confirmat la seva assistència a una conferència entrar aquí.</p>

                        <form name="list" action="regList.php" method="post">
                            <div align="center">
                                <input class="form_submitb" type="submit" name="submit" value="ENTRAR" />
                            </div><br><br>
                        </form>

                        <h3>Confirmació pagaments</h3>
                        <p>Si vols confirmar pagaments entrar aquí.</p>
                        <form name="list" action="payConf.php" method="post">
                            <div align="center">
                                <input class="form_submitb" type="submit" name="submit" value="ENTRAR" />
                            </div>
                        </form><br><br>
                        
                        <h3>Llistat de persones registrades</h3>
                        <p>Si vols veure les persones registrades a una conferència entra aquí</p>
                        <form name="list" action="regList1.php" method="post">
                            <div align="center">
                                <input class="form_submitb" type="submit" name="submit" value="Entrar" />
                            </div>
                        </form><br><br>
                        <div id='boxleft'>
                            <input class="form_submitb"type="button" onclick='window.location.href="gestio.php"'
                                   value="<?php echo $langVoc['back1']; ?>">
                        </div>
                        
                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>

