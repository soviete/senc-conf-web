<?php 
session_start(); 
//ini_set('display_errors', 'On');
//error_reporting(-1);
include 'include/common.php';   
?>

<?php 
//$DBpayUpdate="NO";
//$_SESSION["DBpayUpdate"]=$DBpayUpdate;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <script type="text/javascript" src="Javascript/formvalidation.js"></script>
    </head>
    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>

            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Esborrar usuaris de la base de dades</h1><br>
                        <h3>Introdueix el dni de la persona a la que vols esborrar.</h3>
                        <form action="deleteUserConfirm.php" name="indexform" onSubmit="return validateFormUserDel()"
                          method="post">
                        <div id="UILabel"><?php echo $langVoc['formId']; ?>*</div>
                        <input class="form_tfield" type="text" name="dni" value="" /><br><br>
                        <br>
                        <br>
                        <br>
                        <?php
                            print "<div id='boxleft'>
                                   <input class='form_submitb' onclick='window.location.href=\"admin.php\"'type='button'
                                          value=".$langVoc['back1']." />
                                   </div>";
                        ?>
                        
                        <div align="right">
                            <input class="form_submitb" type="submit" name="submit"
                                   value=<?php echo $langVoc['formNextButton']; ?> />
                            <input type="hidden" name="submitted" value="TRUE" />
                        </div>
                        
                    </div>
                </div>
                
                <div style=" clear: both; height: 1px"></div>
            </div>
            
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>