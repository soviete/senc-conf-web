<?php 
    session_start(); 
    ini_set('display_errors', 'On');
    error_reporting(-1);
    include 'include/common.php';

    $idConference=$_POST["conference"];
        
    
    //echo "======$idConference========";

    //for ($i=0;$i<count($session);$i++)    
    //{     
    //    echo "<br> idSession " . $i . ": " . $session[$i];    
    //} 

    //echo $_POST['conference']['1'];
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
    </head>
    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>
                                   
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Llistat d'assistència</h1><br>
                        
                        
                        <?php    
                        
                            include 'mysql_connect.php';
                            
                            //Extracting sessions from table session to show them in a select
                            
                            $query = "SELECT SENCCONF.SESSIONS.sessionName from SENCCONF.SESSIONS where SENCCONF.SESSIONS.idSESSIONS = '$idConference'";
                            $result = mysql_query($query);                                  
                            $num_rows = mysql_num_rows($result);
                            $row = mysql_fetch_array($result);
                            $sessionName = $row['sessionName'];
                            //echo "que es $num_rows\n";//del
                            
                            if ($num_rows==0)
                                {
                                    echo '<h3>Les sessions no es troben a la base de dades si us plau comunicar-ho al teu webmaster.</h3>
                                          <div id="welcome">
                                          No hi ha cap persona sessió registrada <b>', $num_rows, '</b>.</div>';
                                }
                            
                            else
                                {
                                    
                                    //$ = $row['surname'];
                                    
                                    echo '<h3>LListat de persones confirmades per a la Conferència ' , $sessionName , ' </h3>';
                                    
                                    //echo '<br><div id="note">';
                                                                         
                                }
                            
                            
                            
                            
                            $query="SELECT dni, userName, surname, email from SENCCONF.USERS WHERE SENCCONF.USERS.idUser IN (SELECT SENCCONF.REGISTERED.regIdUser FROM SENCCONF.REGISTERED WHERE SENCCONF.REGISTERED.idRegSession = '$idConference')";
                            
                            //$query = "SELECT idSESSIONS FROM SENCCONF.SESSIONS WHERE idSESSION = '$idSession' ORDER BY idSESSIONS ASC";
                            $result = mysql_query($query);
                            $num_rows = mysql_num_rows($result);
                            
                            //echo "que es $num_rows\n";//del
                            
                            if ($num_rows==0)
                                {
                                    echo '<h3>Persones amb assistència confirmada.</h3>
                                          <div id="welcome">
                                          No hi ha cap persona registrada en aquesta sessió <b>', $num_rows, '</b>.</div>';
                                }
                            
                            else
                                {   
                                    echo '<h3>Persones que han confirmat assistència</h3>
                                          <div id="welcome">';
                                    if ($num_rows == 1) 
                                        {
                                            echo 'Hi ha <b>' , $num_rows, '</b> persona registrada a ', $sessionName,'.</div>';
                                        }
                                    else
                                        {
                                            echo 'Hi ha <b>' , $num_rows, '</b> persones registrades a ', $sessionName,'.</div>';
                                        }
                                    //echo '<input class="form_tfield" type="text" name="first_name" value="" />';
                                    echo '<br><div id="note">';
                                    echo '<table class="aatable">';
                                    echo '<tr>';
                                    echo '<th>DNI</th>';
                                    echo '<th>Cognoms</th>';
                                    echo '<th>Nom</th>';                                    
                                    echo '<th>email</th>';
                                    echo '</tr>';
                                                                                                            
//                                    $query = "SELECT DISTINCT Ensembl_Protein_ID,Uniprot_SwissProt_Accession,PDB_ID FROM Proteins WHERE
//                                    Ensembl_Protein_ID IN (select DISTINCT Proteins_Ensembl_Protein_ID
//                                    from Relations re join Diseases di on re.Diseases_MIM_Accession
//                                    = di.MIM_Accession where MIM_Description= '".$IID."') ORDER BY PDB_ID DESC";
//                                    $query = "SELECT * from REGISTERED";
                                    
                                    $result = mysql_query($query);
                                    
                                    //$i = 0;
                                    
                                    while($row = mysql_fetch_array($result)) 
                                        {                                               
                                            
                                            //opening the form
                                            echo '<form name="payment" action="generateExcel.php" method="post">';
                                            $dni = $row['dni'];
                                            $userName = $row['surname'];
                                            $surname = $row['userName'];
                                            $email = $row['email'];
                                            //$type = $row['type'];
                                            //$regState = $row['regState'];
                                            echo '<tr>';
                                            print "<td>$dni</td>";
                                            //echo "$dni";
                                            echo '';
                                            echo '<td>';
                                            echo "$userName";
                                            echo '</td>';
                                            echo '<td>';
                                            echo "$surname";
                                            echo '</td>';
                                            echo '<td>';
                                            echo "$email";
                                            echo '</td>';
                                            
                                                
                                            //I have only contemplate this field inside the form
                                            //print "<div align='center'><input type='checkbox' name='pay[$i]' value='YES' '/><br></div>";
                                            //print "<p>{$books['course']}: <input type='che' type='checkbox' name='bookinfo[$i]' value='{$books['bookinfo']}' /></p>\n";
                                            
                                            //echo '<div align="center"><input type="checkbox" name="pay';
                                            //echo "$num";
                                            //echo '"><br></div>';
                                            //++$i;
                                        }
                                                                          
                                     echo '</table>';
                                     echo '</div>';
                                     echo '<br>';
                                     echo'<div align="center">
                                                    
                                                 <input class="form_submitb" type="submit" name="submit" value="Baixar excel" />
                                                 <input type="hidden" name="table" value=';
                                     echo "$idConference";
                                     echo ' /></div><br>';
                                     echo '</form>';
                                }
                                

                        ?>    
                        
                    </div>
                </div>
                
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php
                $_SESSION["sessionName"]=$sessionName;
            ?>
            
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>