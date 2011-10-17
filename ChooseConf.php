<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';


if ($_POST['name'] and $_POST['surname'] and $_POST['dni'] and $_POST['email'] and $_POST['type']) 
    {    
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['surname'] = $_POST['surname'];
        $_SESSION['dni'] = $_POST['dni'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['type'] = $_POST['type'];
        $_SESSION['name'] = $_POST['name'];
        
        $name=$_SESSION['name'];
        $surname=$_SESSION['surname'];
        $dni=$_SESSION['dni'];
        $email=$_SESSION['email'];
        $type=$_SESSION['type'];
        $empty="NO";
    }   

else 
    {
        if ($_SESSION['name'] and $_SESSION['surname'] and $_SESSION['dni'] and $_SESSION['email'] and $_SESSION['type'])
            {
                $name=$_SESSION['name'];
                $surname=$_SESSION['surname'];
                $dni=$_SESSION['dni'];
                $email=$_SESSION['email'];
                $type=$_SESSION['type'];
                $empty="NO";
            }
        else 
            {
                $empty="YES";
            }
    }
    
//if (!$_POST) {
//    //echo "He passat per aqui\n";
//    redirect("index.php");
//}

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

                        <form action="AddUser.php" method="post">
                            <?php
                            echo '<h3>';
                            echo $langVoc['formChoose'];
                            echo '</h3><br>';  //echo $_POST['name']; echo '======\n';
//                            if ($_POST['name'] and $_POST['surname'] and $_POST['dni']
//                                    and $_POST['email'] and $_POST['type']) {
//                                $_SESSION['name'] = $_POST['name'];
//                                $_SESSION['surname'] = $_POST['surname'];
//                                $_SESSION['dni'] = $_POST['dni'];
//                                $_SESSION['email'] = $_POST['email'];
//                                $_SESSION['type'] = $_POST['type'];
//                                $name=$_SESSION['name'];
//                                $surname=$_SESSION['surname'];
//                                $dni=$_SESSION['dni'];
//                                $email=$_SESSION['email'];
//                                $type=$_SESSION['type'];
//                                $empty="NO";
//                            }
//                            else {
//                                $empty="YES";
//                            }
                            switch ($empty) {
                                case "YES":
                                    echo $langVoc['emptyfield'];
                                    break;
                                case "NO";
                                    if (!validChar($name)) {
                                        echo $langVoc['nameError'];
                                    }
                                    else if (!validChar($surname)) {
                                        echo $langVoc['surnameError'];
                                    }
                                    else if (!validNum($dni)) {
                                        echo $langVoc['dniError'];
                                    }
                                    else if (!validEmail($email)) {
                                        echo $langVoc['emailError'];
                                    }
                                    else {
                                        include 'mysql_connect.php';
                                        $events=mysql_query("SELECT idSESSIONS,sessionName,
                                            UNIX_TIMESTAMP(sessionDate),room FROM SESSIONS");
                                        while($row = mysql_fetch_assoc($events,MYSQL_NUM)) {
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


