<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';

// Getting variable from post form if any.

if (!$_POST) {
    if ($_SESSION['dni']) {
        $dni=$_SESSION['dni'];
        $empty="NO";
    }
    else {
        $empty='YES';
    }

}

elseif (!empty($_POST)) {

    if ($_POST['dni']) {

        $_SESSION['dni'] = $_POST['dni'];
        $dni=$_SESSION['dni'];

        $empty="NO";
    }
    else {
        $empty="YES";
    }
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
                        <form action="deleteUserAction.php" method="post">
                            <?php
                            include 'mysql_connect.php';
                            echo '<h3>';
                            echo "Confirmació de l'element a esborrar";
                            //echo "$dni";echo "================";
                            echo '</h3><br>';
                            // Handling errors and printing text
                            $queryUser = "SELECT dni, userName, surname, email, type from formulario.USERS WHERE dni='$dni'";
                            $result = mysql_query($queryUser);
                            $num_rows = mysql_num_rows($result);

                            switch ($empty) {
                                case "YES":
                                    echo $langVoc['emptyfieldAdmin'];
                                    print "<br><br><div id='boxleft'>
                                   <input class='form_submitb' onclick='window.location.href=\"deleteUser.php\"'type='button'
                                          value=".$langVoc['back1']." />
                                   </div>";
                                    break;
                                case "NO";

                                    if (!validNum($dni)) {
                                        echo $langVoc['dniErrorAdmin'];
                                        print "<div id='boxleft'>
                                   <input class='form_submitb' onclick='window.location.href=\"deleteUser.php\"'type='button'
                                          value=".$langVoc['back1']." />
                                   </div>";
                                    }

                                    elseif ($num_rows==0) {
                                        echo "No hi ha cap persona amb aquest DNI a la base de dades!!!";
                                        print "<br><br><div id='boxleft'>
                                                <br><br>
                                                <input class='form_submitb' onclick='window.location.href=\"deleteUser.php\"'type='button'
                                                       value=".$langVoc['back1']." />
                                                </div>";
                                    }

                                    else {


                                        $resultUser = mysql_fetch_array ($result);
                                        $dni = $resultUser['dni'];
                                        $userName = $resultUser['surname'];
                                        $surname = $resultUser['userName'];
                                        $email = $resultUser['email'];
//                                          print "<h3 align='justify' >"."L'usuari ha estat borra't correctament"."</h3>";
                                        print "<p align='justify'>"."Estàs segur de que vols esborrar de la base de dades l'usuari amb aquestes dades:"."</p>";
                                        echo '<ul>';

                                        print "<div class='adduserRegis'>
                                                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp DNI: <b>$dni</b>
                                                                   <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Name: $userName
                                                                   <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Surname: $surname
                                                                   <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Email: $email<br>
                                                                   <br></div>";
                                        echo '<ul>';
                                        echo '<br>';

                                        print "<br><br><br>";
                                        print "<br><br><div id='boxleft'>
                                                <input class='form_submitb' onclick='window.location.href=\"deleteUser.php\"'type='button'
                                                       value=".$langVoc['back1']." />
                                                </div>";
                                        print "<div align='right'>
                                                <input class='form_submitb' type='submit' name='submit'
                                                       value="."Següent"." />
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