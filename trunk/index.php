<?php
ini_set('display_errors', 'On');
error_reporting(-1);
session_start();
include 'include/common.php';
 ?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulari d'inscripció a conferències</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    
    <div id="lang">
    <ul>
        <li><a href="index.php?lang=ca">cat</a></li>
        <li><a href="index.php?lang=es">esp</a></li>
        <li><a href="index.php?lang=en"">eng</a></li>
    </ul>
    </div>
    
    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1><?php echo $langVoc['formTitle']; ?></h1><br>
                        <h3><?php echo $langVoc['formSubTitle']; ?></h3>
                        <form action="ChooseConf.php" method="post">
                            <div id="UILabel"><?php echo $langVoc['formName']; ?>*</div>
                            <input class="form_tfield" type="text" name="name" value="" /><br><br>
                            <div id="UILabel"><?php echo $langVoc['formSurname']; ?>*</div>
                            <input class="form_tfield" type="text" name="surname" value="" /><br><br>
                                <div id="UILabel"><?php echo $langVoc['formId']; ?>*</div>
                            <input class="form_tfield" type="text" name="dni" value="" /><br><br>
                            <div id="UILabel"><?php echo $langVoc['formEmail']; ?>*</div>
                            <input class="form_tfield" type="text" name="email" value="" /><br><br>
                            <div id="UILabel"><?php echo $langVoc['formRegOption']; ?>*</div>
                            <input class="form_tfield" type="text" name="type" value="" /><br><br><br>
                           <div align="right">
                                <input class="form_submitb" type="submit" name="submit" value=<?php echo $langVoc['formNextButton']; ?> />
                                <input type="hidden" name="submitted" value="TRUE" />
                            </div>
                            <br>
                            <div id="note">
                                <small>
                                    *<?php echo $langVoc['mandatoryField']; ?>
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php';
            ?>
        </div>
    </body>
</html>


