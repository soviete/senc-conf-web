<?php
ini_set('display_errors', 'On');
error_reporting(-1);
session_start();
include 'include/common.php';

// Getting variable from post form if any.

if (!$_POST)  {
    if ($_SESSION['name'] and $_SESSION['surname'] and $_SESSION['dni'] and $_SESSION['email']
            and $_SESSION['emailConfirm'] and $_SESSION['type']) {
        $name=$_SESSION['name'];
        $surname=$_SESSION['surname'];
        $dni=$_SESSION['dni'];
        $email=$_SESSION['email'];
        $emailConfirm=$_SESSION['emailConfirm'];
        $type=$_SESSION['type'];
        $empty="NO";
    }
    else {
        $empty='YES';
    }

}

elseif (!empty($_POST)) {

    if ($_POST['name'] and $_POST['surname'] and $_POST['dni'] and $_POST['email']
            and $_POST['emailConfirm'] and $_POST['type']) {

        $_SESSION['name'] = $_POST['name'];
        $_SESSION['surname'] = $_POST['surname'];
        $_SESSION['dni'] = $_POST['dni'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['emailConfirm'] = $_POST['emailConfirm'];
        $_SESSION['type'] = $_POST['type'];
        $_SESSION['name'] = $_POST['name'];

        $name=$_SESSION['name'];
        $surname=$_SESSION['surname'];
        $dni=$_SESSION['dni'];
        $email=$_SESSION['email'];
        $emailConfirm=$_SESSION['emailConfirm'];
        $type=$_SESSION['type'];
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
                        <h1><?php echo $langVoc['formTitle']; ?></h1><br>
                        <form action="ChooseConf.php" method="post">
                            <?php
                            echo '<h3>';
                            echo $langVoc['Terms0'];
                            echo '</h3><br>';
                            // Handling errors and printing checkboxes
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
                                    else if (!validEmail($emailConfirm)) {
                                        echo $langVoc['emailErrorConf'];
                                    }
                                    else if (!equalEmail($email, $emailConfirm)) {
                                        echo $langVoc['emailNotMatch'];
                                    }
                                    else {
                                        print "<h3 align='justify' >".$langVoc['Terms1']."</h3>";
                                        print "<p align='justify'>".$langVoc['Terms2']."</p>";
                                        print "<br><br><br>";
                                        print "<div align='right'>
                                                <input class='form_submitb' type='submit' name='submit'
                                                       value=".$langVoc['TermsButton']." />
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


