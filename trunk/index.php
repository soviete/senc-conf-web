<?php
ini_set('display_errors', 'On');
error_reporting(-1);
//session_start();
include 'include/common.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Formulari d'inscripció a conferències</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <!script type="text/javascript" src="Javascript/formvalidation.js"><!/script>
</head>

<body>
    <div  id="wrapper">
        <?php include 'include/header.php'; ?>
        <div id="page">
            <div id="content">
                <div id="welcome">
                    <h1><?php echo $langVoc['regInfoTitle']; ?></h1><br>
                    <h3 align="justify" ><?php echo $langVoc['regInfo']; ?></h3>
                    <h3><?php echo $langVoc['procedureReg']; ?></h3>
                    <ul>
                        <li type="disc"><?php echo $langVoc['procedureReg1']; ?></li>
                        <li type="disc"><?php echo $langVoc['procedureReg2']; ?></li>    
                        <li type="disc"><?php echo $langVoc['procedureReg3']; ?></li>    
                        <li type="disc"><?php echo $langVoc['procedureReg4']; ?></li>                        
                    </ul>
                    <br><br>
                    <div align="right">
                    <form method="link" action="dataForm.php">
                    <input INPUT TYPE="submit" class="form_submitb" value=<?php echo $langVoc['startReg']; ?>>
                    </form>
                    </div>                                      
                </div>
            </div>
            <div style=" clear: both; height: 1px"></div>
        </div>
        <?php include 'include/footer.php';
        ?>
    </div>
</body>
</html>