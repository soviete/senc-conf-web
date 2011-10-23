<?php
ini_set('display_errors', 'On');
error_reporting(-1);
session_start();
include 'include/common.php';

if (empty ($_POST['type']))  {

    if ($_SESSION['type']) {
        $type=$_SESSION['type'];
    }

}

else{

    if ($_POST['type']) {

        $_SESSION['type'] = $_POST['type'];
        $type=$_SESSION['type'];
    }

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
                        <h1><?php echo $langVoc['formTitle']; ?></h1><br>
                        <form action="gestioOptions.php" method="post">
                            <?php
                            echo '<h3>';
                            echo $langVoc['formChoose'];
                            echo '</h3><br>';

                            include 'mysql_connect.php';

                            //Name of the session in different languages
                            $sessionName = "sessionName".$lang;

                            $events=mysql_query("SELECT idSESSIONS, $sessionName,
                                            UNIX_TIMESTAMP(sessionDate),room FROM SESSIONS");
                            while($row = mysql_fetch_array($events)) {
                                $D=date("d",$row[2]);
                                $M=date("n",$row[2]);
                                $Y=date("Y",$row[2]);
                                $fecha="$D $M $Y";
                                print "<input class='form_tfield' type='checkbox'
                                            name='confs[$row[0]]]' /> &nbsp;<b>$row[1]</b>
                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i>$fecha</i>
                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i>$row[3]</i><br>
                                            <br>";
                            }
                            print "<br><br><br><br><br><br>";
                            print "<div align='right'>
                                            <input class='form_submitb' type='submit' name='submit'
                                       value=".$langVoc['register']." />
                                        <input type='hidden' name='submitted' value='TRUE' />
                                        </div>";
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


