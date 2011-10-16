<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';
//echo $lang;echo "=======";//del
//echo $_SESSION['name'];echo "=======";//del
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulari d'inscripció a conferències</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <script type="text/javascript" src="Javascript/numberSessionsVal.js">
        </script>
    </head>
    
    <div id="lang">
    <ul>
        <li><a href="ChooseConfTwelve.php?lang=en"">eng</a></li>
        <li><a href="ChooseConfTwelve.php?lang=es">esp</a></li>
        <li><a href="ChooseConfTwelve.php?lang=ca">cat</a></li>
    </ul>
    </div>
    
    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1><?php echo $langVoc['formTitle']; ?></h1><br>

                        <form id="confList" action="gestioOptions.php" onsubmit="return validate()"  method="post">
                            <?php
                            if (!$_POST) {
                                echo '<h4>'; echo $langVoc['remindChoose']; echo '</h4><br>';
                            }
                            else {
                                echo '<h3>'; echo $langVoc['formChoose']; echo '</h3><br>';
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
                                print "<input class='form_tfield' type='checkbox' name='confs[]' /> &nbsp;$row[1]($row[2])<br><br>";
                            }
                            ?>
                            <br><br><br><br><br><br>
                            <div align="right">
                                <input class="form_submitb" type="submit" name="submit" value=<?php echo $langVoc['register']; ?> />
                                <input type="hidden" name="submitted" value="TRUE";/>
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


