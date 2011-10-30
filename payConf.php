<?php 
//ini_set('display_errors', 'On');
//error_reporting(-1);
session_start();
include 'include/common.php';
?>

<?php 
$DBpayUpdate="NO";
$_SESSION["DBpayUpdate"]=$DBpayUpdate;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Persones registrades</title>
        <link rel="stylesheet" type="text/css" href="estilo.css" />
    </head>
    <body>
        <div  id="wrapper">
            <?php include 'include/header.php'; ?>

            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Llistat de persones registrades sense confirmació de pagament</h1><br>


                        <?php

                        include 'mysql_connect.php';

                        //Extracting registered persons without payment confirmation from both types of "con acreditacion registration"
                        //$query = "SELECT * from SENCCONF.USERS WHERE regState = 'pendent'";
                        $query = "SELECT dni, userName, surname, type, paid FROM formulario.USERS WHERE paid = 'no' ORDER BY surname ASC";
                        $result = mysql_query($query);
                        $num_rows = mysql_num_rows($result);

                        //echo "que es $num_rows\n";//del

                        if ($num_rows==0) {
                            echo '<h3>Persones registrades sense confirmació de pagament</h3>
                                          <div id="welcome">
                                          No hi ha cap persona registrada pendent de pagament <b>', $num_rows, '</b>.</div>';
                        }

                        else {
                            echo '<h3>Persones registrades sense confirmació de pagament</h3>
                                          <div id="welcome">
                                          Hi ha <b>' , $num_rows, '</b> persones registrades sense confirmació de pagament.</div>';
                            //echo '<input class="form_tfield" type="text" name="first_name" value="" />';
                            echo '<br><div id="note">';
                            echo '<table class="aatable">';
                            echo '<tr>';
                            echo '<th>DNI</th>';
                            echo '<th>Cognoms</th>';
                            echo '<th>Nom</th>';
                            echo '<th>Tipus d\'acreditació</th>';
                            echo '<th>Estat de pagament</th>';
                            echo '<th>Confirmar pagament</th>';
                            echo '</tr>';

//                                    $query = "SELECT DISTINCT Ensembl_Protein_ID,Uniprot_SwissProt_Accession,PDB_ID FROM Proteins WHERE
//                                    Ensembl_Protein_ID IN (select DISTINCT Proteins_Ensembl_Protein_ID
//                                    from Relations re join Diseases di on re.Diseases_MIM_Accession
//                                    = di.MIM_Accession where MIM_Description= '".$IID."') ORDER BY PDB_ID DESC";
//                                    $query = "SELECT * from REGISTERED";

                            $result = mysql_query($query);

                            $i = 0;

                            while($row = mysql_fetch_array($result)) {

                                //opening the form
                                echo '<form name="payment" action="payUpdate.php" method="post">';
                                $dni = $row['dni'];
                                $userName = $row['surname'];
                                $surname = $row['userName'];
                                $type = $row['type'];
                                $paid = $row['paid'];
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
                                echo "$type";
                                echo '</td>';
                                echo '<td>';
                                echo "$paid";
                                echo '</td>';
                                echo '<td>';
                                //I have only contemplate this field inside the form
                                print "<div align='center'><input type='checkbox' name='pay[$i]' value='YES' '/><br></div>";
                                //print "<p>{$books['course']}: <input type='che' type='checkbox' name='bookinfo[$i]' value='{$books['bookinfo']}' /></p>\n";

                                //echo '<div align="center"><input type="checkbox" name="pay';
                                //echo "$num";
                                //echo '"><br></div>';
                                ++$i;
                            }

                            echo '</table>';
                            echo '</div>';
                            echo '<br><br>';
                            echo'<div align="center">
                                                 <input class="form_submitb" type="submit" name="submit" value="Guardar canvis" />
                                                 <input type="hidden" name="submitted" value="TRUE" />
                                                 </div><br>';
                            echo '</form>';
                        }
                        print "<br><br>
                                        <div align=center>
                                                <input class='form_submitb' onclick='window.location.href=\"admin.php\"'type='button'
                                                       value=".$langVoc['back1']." />
                                                </div>";



                        ?>

                    </div>
                </div>

                <div style=" clear: both; height: 1px"></div>
            </div>
<?php include 'include/footer.php'; ?>
        </div>
    </body>
</html>