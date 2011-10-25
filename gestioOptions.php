<?php
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();

$optionReg = $_SESSION['type'];

if (empty ($_POST['confs']))
    {           
        header ('Location:errorNoSessionChosen.php');
    }
    
else    
    {
        $_SESSION['confs'] = $_POST['confs'];
   
        switch ($optionReg) 
                {
                    //CASE 12 sessions
                    case 'C12':

                    if (count($_POST['confs'])<12)
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
                    case 'C8':

                    if (count($_POST['confs'])<8)
                        {   
                            $_SESSION['neededConf']= 8;
                            $_SESSION['chosenConf']= count($_POST['confs']);

                            header ('Location:errorNumberSession.php');

                        }
                    else     
                        {
                            header ('Location:AddUser.php');
                        }
                    break;
                    
                    case 'C1':

                    if (count($_POST['confs'])<1)
                        {   
                            $_SESSION['neededConf']= 1;
                            $_SESSION['chosenConf']= count($_POST['confs']);

                            header ('Location:errorNumberSession.php');

                        }    
                    else     
                        {
                            header ('Location:AddUser.php');
                        }

                    break;    
                }
    }
    
?>
