<?php
ini_set('display_errors', 'On');
error_reporting(-1);
session_start();
//include 'include/common.php';

$option = "12";//Esto tenemos que recogerlo del form del principio cuando este hecho

if (empty ($_POST['confs']))
    {           
        header ('Location:errorNoSessionChosen.php');
    }
    
else    
    {
        $_SESSION['confs'] = $_POST['confs'];
   
        switch ($option) 
                {
                    //CASE 12 sessions
                    case '12':

                    if (count($_POST['confs'])<2)
                        {
                            $_SESSION['neededConf']= 12;
                            $_SESSION['chosenConf']= count($_POST['confs']);

                            header ('Location:errorNumberSession.php');

                        }
                    else     
                        {
                            header ('Location:AddUser.php');
                        }

                    break;

                    //CASE 8 sessions
                    case '8':

                    if (count($_POST['confs'])<8)
                        {   
                            $_SESSION['neededConf']= 8;
                            $_SESSION['chosenConf']= count($_POST['confs']);

                            header ('Location:errorNumberSession.php');

                        }

                    break;    
                }
            //echo "============";
            //print_r($_SESSION['confs']);
    }
    
?>
