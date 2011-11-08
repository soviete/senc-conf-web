<?php session_start(); 
//ini_set('display_errors', 'On');
//error_reporting(-1);
$origin = $_SESSION['origin'];
?>
<?php
    $sessionName=$_SESSION["sessionName"];
    //echo $_SESSION["sessionName"];echo "===============";
    $idConference = $_SESSION["idConference"];
    //echo "=====================$idConference======";//del
    //echo 'culooooooooooooo';
    //echo $_SERVER['HTTP_REFERER'];
    //die;
    
    include 'mysql_connect.php';
   
    if ($origin == "regListTable.php")
        {
                        
            $query="SELECT dni, userName, surname, email, paid, type from formulario.USERS WHERE formulario.USERS.idUser IN (SELECT formulario.CONFIRMED.confIdUser FROM formulario.CONFIRMED WHERE formulario.CONFIRMED.idConfSession = '$idConference')";
            $result = mysql_query($query);
            $num_rows = mysql_num_rows($result);


            //Creating and opening file local
            //$nameFile="/Library/WebServer/Documents/SENCCONFsvn/file/listConf_$idConference.csv";
            
            //Creating and opening file server
            $nameFile="/var/www/vhosts/senc.es/subdomains/conferencias/httpdocs/temp/listConf_$idConference.csv";

            if (file_exists($nameFile))
                {
                    unlink($nameFile);
                }

            $file=fopen($nameFile,"a+");

            fputs ($file, "dni\tsurname\tname\tmail\tregistration_type\tpayment\n");

            while ($row = mysql_fetch_array($result)) 
                {                                               
                    $dni = $row['dni'];
                    $userName = $row['surname'];
                    $surname = $row['userName'];
                    $email = $row['email'];
                    $type = $row['type'];
                    $paid = $row['paid'];
                   
                    fwrite($file, utf8_decode ($dni."\t"));
                    fwrite($file, utf8_decode ($userName."\t"));
                    fwrite($file, utf8_decode ($surname."\t"));
                    fwrite($file, utf8_decode ($email."\t"));
                    fwrite($file, utf8_decode ($type."\t"));
                    fwrite($file, utf8_decode ($paid."\n"));
                }
            //die;
            //$_SESSION["idConference"]=$idConference;
            fclose($file);
            //chmod($nameFile, 0777);

            $_SESSION["nameFile"]="listConf_$idConference.csv";//echo $nameFile;
            header ('Location:excelGeneratedOk.php');
        }
        
        elseif ($origin == "regListTable1.php")
            {
                                
                $query="SELECT dni, userName, surname, email, paid, type from formulario.USERS WHERE formulario.USERS.idUser IN (SELECT formulario.REGISTERED.regIdUser FROM formulario.REGISTERED WHERE formulario.REGISTERED.idRegSession = '$idConference')";

                $result = mysql_query($query);
                $num_rows = mysql_num_rows($result);

            
                //Creating and opening file local
                //$nameFile="/Library/WebServer/Documents/SENCCONFsvn/file/listConf_$idConference.csv";
            
                //Creating and opening file server
                $nameFile="/var/www/vhosts/senc.es/subdomains/conferencias/httpdocs/temp/listConf_$idConference.csv";
                
                if (file_exists($nameFile))
                    {
                        unlink($nameFile);
                        //echo "l'arxiu existeix\n";
                    }

                $file=fopen($nameFile,"a+");

                fputs ($file, "dni\tsurname\tname\tmail\tregistration_type\tpayment\n");
                
                while ($row = mysql_fetch_array($result)) 
                    {                                               
                        $dni = $row['dni'];
                        $userName = $row['surname'];
                        $surname = $row['userName'];
                        $email = $row['email'];
                        $type = $row['type'];
                        $paid = $row['paid'];
                                                
                        fwrite($file, utf8_decode ($dni."\t"));
                        fwrite($file, utf8_decode ($userName."\t"));
                        fwrite($file, utf8_decode ($surname."\t"));
                        fwrite($file, utf8_decode ($email."\t"));
                        fwrite($file, utf8_decode ($type."\t"));
                        fwrite($file, utf8_decode ($paid."\n"));
                    }
                //die;
                //$_SESSION["idConference"]=$idConference;
                fclose($file);
                //chmod($nameFile, 0777);

                $_SESSION["nameFile"]="listConf_$idConference.csv";//echo $nameFile;
                header ('Location:excelGeneratedOk.php');
            }
?>
