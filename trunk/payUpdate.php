<?php session_start(); ?>
<?php
    
    if (isset ($_SESSION["DBpayUpdate"]))
        {
            if ($_SESSION["DBpayUpdate"] == "YES")
                {
                    //echo $_SESSION["DBpayUpdate"];
                    //echo "----------que porta ------------------";
                    header ('Location:errorUpdateDone.php');
                    //header ('Location:payModifiedOk.php');
                }
        

            else if ($_SESSION["DBpayUpdate"] == "NO")
                {
            
        
        
            $DBpayUpdate = $_SESSION["DBpayUpdate"];
            //echo "--------- $DBpayUpdate\n";
                            
                     

  

            //TENGO QUE TENER UN PHP LIMPIO SIN HTML SINO YA ME HA EMPEZADO A ENSENYAR LA PAGINA
                include 'mysql_connect.php';

                $query = "SELECT idUser, dni, userName, surname, type, paid FROM USERS WHERE paid = 'no' ORDER BY surname ASC";
                $result = mysql_query($query);
                $num_rows = mysql_num_rows($result);

                $result = mysql_query($query);

                $i = 0;

                while($row = mysql_fetch_array($result)) 
                    {            
                        $payment = $_POST['pay'][$i];
                        
                        //Si el pago no viene con el checkbox escogido entonces pasamos al siguiente (continue)
                        if (!$payment)
                            {   
                                $surname = $row['userName'];
                                //echo "es queda igual....$surname ----> NO<br><br>";
                                ++$i;
                                continue;
                            }

                        else
                            {
                                $id = $row['idUser'];
                                $dni = $row['dni'];
                                $userName = $row['surname'];
                                $surname = $row['userName'];
                                $type = $row['type'];
                                $paid = $row['paid'];
                                //echo "Canvia $surname ----> $payment<br><br>";
                                //echo "----------------$id";
                                $query=mysql_query("UPDATE SENCCONF.USERS SET paid ='yes' WHERE idUser = '$id'");
                                if (!$query) {
                                                trigger_error ('Wrong QUERY: ' . mysql_error() );
                                             }


                            }
                        //echo '<form name="payment" action="payUpdate.php" method="post">';



                        ++$i;
                    }
                    
                    #Session variable to know whether the user has already updated the DB
                    $DBpayUpdate="YES";
                    $_SESSION["DBpayUpdate"]=$DBpayUpdate;
                    
                    //echo $_SESSION["DBpayUpdate"];
                    header ('Location:payModifiedOk.php');

                //$size = count($_POST['pay']);
    //echo "culo\n<br>";
    //echo "el tamany es $size<br>\n\n";
    //echo "el valor es $size\n";

        $i=0;
        $j=1;
        $x=2;


//            $payment = $_POST['pay'][$i];
//            $payment1 = $_POST['pay'][$j];
//            $payment2 = $_POST['pay'][$x];
//            
//            if ($_POST['pay'][$i]=='on')
//                {
//                 echo "lo tengo";
//                }
//                
//            echo "payment is $payment\n<br>";
//            echo "payment is $payment1<br>";
//            echo "payment is $payment2<br>";
            }
        }
?>