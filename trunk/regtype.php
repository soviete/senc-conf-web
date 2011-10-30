<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';
if ($_SESSION) {
    if ($_SESSION['name'] and $_SESSION['surname'] and $_SESSION['dni'] and $_SESSION['email']
            and $_SESSION['emailConfirm']) {
        $name=$_SESSION['name'];
        $surname=$_SESSION['surname'];
        $dni=$_SESSION['dni'];
        $email=$_SESSION['email'];
        $emailConfirm=$_SESSION['emailConfirm'];
    }
}

else {
    header("Location: index.php");
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta  http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulari d'inscripció a conferències</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>

    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1><?php echo $langVoc['formTitle']; ?></h1><br>
                        <h3><?php echo $langVoc['regtype0']; ?></h3>
<!--                        <ul>-->
                            
                                <?php echo $langVoc['regtypeExtra']; ?>
                                <?php echo $langVoc['regtypeExtra0']; ?>
                                <?php echo $langVoc['regtypeExtra1']; ?>
<!--                            <li>    -->
                                <?php echo $langVoc['regtypeExtra2']; ?>
                                
<!--                                <?php //echo $langVoc['regtype1']; ?><br>-->
<!--                                <?php //echo $langVoc['regtype2']; ?><br>-->
                                <p align="center"><a href="http://www.uab.es/servlet/Satellite/informacio-academica-de-llicenciatures-diplomatures-i-enginyeries/lliure-eleccio/reconeixement-de-credits-1096476958289.html"
                                                     target="_blank">UAB</a><br>
                                    <a href="http://www.upf.edu/universitat/normativa/upf/normativa/grau/rd1457/socioac.html"
                                       target="_blank">UPF</a></p>
<!--                            </li>
                            <li>-->
                                <?php //echo $langVoc['regtype3']; ?>
                                <?php echo $langVoc['regtypeExtra3']; ?>                            
<!--                            </li>
                            <li>-->
                                <?php //echo $langVoc['regtype4']; ?>
                                <?php echo $langVoc['regtypeExtra4']; ?>                            
<!--                            </li>-->
<!--                        </ul>-->
                        <br>
                        <h3><?php echo $langVoc['regtype5']; ?></h3>
                        <br>
                        <form action="ChooseConf.php" name="regtype" method="post">
                            <div id="selectcentered">
                                <div id="UILabel"><?php echo $langVoc['formRegOption']; ?>*<br></div>
                                <select class="form_tfield" name="type">
                                    <option value="C12"><?php echo $langVoc['formRegOption1']; ?></option>
                                    <option disabled="disabled" value="C8" ><?php echo $langVoc['formRegOption2']; ?>
                                    </option>
                                    <option disabled="disabled" value="C1" ><?php echo $langVoc['formRegOption3']; ?>
                                    </option>
                                </select></div>
                            <br><br><br><br><br><br>
                            <div align="right">
                                <input class="form_submitb" type="submit" name="submit"
                                       value=<?php echo $langVoc['formNextButton']; ?> />
                                <input type="hidden" name="submitted" value="TRUE" />
                            </div>
                            <br>
                        </form>
                    </div>

                </div>
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>


