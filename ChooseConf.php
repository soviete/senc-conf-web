<?php
ini_set('display_errors', 1);
error_reporting(E_ALL|E_STRICT);
session_start();
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
                        <h1>Formulari d'inscripció a conferències</h1><br>
                     
                        <form action="AddUser.php" method="post">
                            <?php
                            if (!$_POST) {
                                echo "<h4>2 - Recorda, tria almenys una conferència aquesta vegada!!!</h4><br>";
                            }
                            else {
                                echo "<h3>2 - Triï les conferències a les quals assistirà:</h3><br>";
                                if ($_POST['name'] and $_POST['surname'] and $_POST['dni']
                                        and $_POST['email'] and $_POST['type']) {
                                    $_SESSION['name'] = $_POST['name'];
                                    $_SESSION['surname'] = $_POST['surname'];
                                    $_SESSION['dni'] = $_POST['dni'];
                                    $_SESSION['email'] = $_POST['email'];
                                    $_SESSION['type'] = $_POST['type'];
                                }
                                else {
                                    //echo '<h3>ERROR!</h3>A field in the form is missing!<br>
                                    //Please <a href=index.php>Go back</a> and try again.';
                                    echo '<h3>ERROR!</h3>Revisi el formulari, potser hi ha
                                camps buits<br> Si us plau, torni a intentar-ho.
                                <a href=index.php>INSCRIPCIÓ</a>';
                                }
                            }
                            include 'mysql_connect.php';
                            $events=mysql_query("SELECT idSESSIONS,sessionName,sessionDate FROM SESSIONS");
                            while($row = mysql_fetch_assoc($events,MYSQL_NUM)) {
                                print "<input class='form_tfield' type='checkbox' name='confs[$row[0]]]' /> &nbsp;$row[1]($row[2])<br><br>";
                            }
                            ?>
                            <br><br><br><br><br><br>
                            <div align="right">
                                <input class="form_submitb" type="submit" name="submit" value="Inscriura't!" />
                                <input type="hidden" name="submitted" value="TRUE" />
                            </div>
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


