<?php session_start(); ?>
<?php
    $sessionName=$_SESSION["sessionName"];
    //echo $_SESSION["sessionName"];echo "===============";
    $idConference = $_POST["table"];
    //echo "$idConference======";//del
    
    include 'mysql_connect.php';
    
    $query="SELECT dni, userName, surname, email from SENCCONF.USERS WHERE SENCCONF.USERS.idUser IN (SELECT SENCCONF.REGISTERED.regIdUser FROM SENCCONF.REGISTERED WHERE SENCCONF.REGISTERED.idRegSession = '$idConference')";
    $result = mysql_query($query);
    $num_rows = mysql_num_rows($result);
                            
    //echo "que es $num_rows\n";//del
    
    //Creating and opening file
    $nameFile="/Library/WebServer/Documents/SENCCONFsvn/file/listConf_$idConference.csv";
    //$nameFile="/Users/jespinosa/filesWeb/listConf_$idConference.csv";
    
    //echo "$nameFile";//del
    if (file_exists($nameFile))
        {
            unlink($nameFile);
            //echo "l'arxiu existeix\n";
        }
    
    $file=fopen($nameFile,"a+");
    
    fputs ($file, "dni\tsurname\tname\tmail\n");
    
    while ($row = mysql_fetch_array($result)) 
        {                                               
            $dni = $row['dni'];
            $userName = $row['surname'];
            $surname = $row['userName'];
            $email = $row['email'];
            
            fputs($file, $dni."\t");
            fputs($file, $userName."\t");
            fputs($file, $surname."\t");
            fputs($file, $email."\n");
        }
    
    //$_SESSION["idConference"]=$idConference;
    fclose($file);
    //chmod($nameFile, 0777);
    
    $_SESSION["nameFile"]="listConf_$idConference.csv";//echo $nameFile;
    header ('Location:excelGeneratedOk.php');    
?>
