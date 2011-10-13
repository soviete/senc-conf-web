<?php session_start(); ?>

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
                            $query = "SELECT sessionName, idSESSIONS FROM SENCCONF.SESSIONS ORDER BY idSESSIONS ASC";
                            $result = mysql_query($query);
                            $num_rows = mysql_num_rows($result);
                            
                            //echo "que es $num_rows\n";//del
                            
                            if ($num_rows==0)
                                {
                                    echo '<h3>Les sessions no es troben a la base de dades si us plau comunicar-ho al teu webmaster.</h3>
                                          <div id="welcome">
                                          No hi ha cap persona sessió registrada <b>', $num_rows, '</b>.</div>';
                                }
                            
                            else
                                {   
                                    echo '<h3>Tria la conferència de la qual vols veure el llistat d\'assistència.</h3>';
                                    //echo '<input class="form_tfield" type="text" name="first_name" value="" />';
                                    print "<form action='regListTable.php' method='post' name='sessions'>";
                                    echo '<br><div id="note">';
                                    print "<select multiple name='conference'>";
                                                                       
                                    $result = mysql_query($query);
                                    
                                    $i = 0;
                                    
                                    while($row = mysql_fetch_array($result)) 
                                        {                                               
                                                                                     
                                            $sessionName = $row['sessionName'];
                                            $idSession = $row['idSESSIONS'];
                                            
                                            print "<option value='$idSession'>$sessionName</option>";
                                            
                                            ++$i;
                                        }
                                        
                                     print "</select>";
                                     
                                     print "<input type='submit' value='Carregar tabla'>"; 
                                                                                                               
                                     
                                     
                                     echo '<br>';
                                     
                                     print "</form>";
                                     
                                     echo '</div><br>';                                     
                                }
                            
                            
                                

                        ?>    
                        
                    </div>
                </div>
                
                <div style=" clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>