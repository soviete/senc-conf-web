<?php
ini_set('display_errors', 'On');
error_reporting(-1);
session_start();
include 'include/common.php';
include 'mysql_connect.php';

// CONFERENCE ID
$idSession='1';

// MAIL HEADERS
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

// Additional headers
$headers .= 'From: El Cerebro Invade la Ciudad <DONOTREPLY@elcervell.com>' . "\r\n";
$headers .= "Reply-To: El Cerebro Invade la Ciudad <INFO@elcervell.com>\r\n";
$headers .= 'Return-Path: El Cerebro Invade la Ciudad <INFO@elcervell.com>' . "\r\n";
$headers .= "Organization: Sender Organization\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

// QUERY
$query0=mysql_query("SELECT idUser, userName, email, lang from USERS WHERE idUser IN
                                (SELECT reservIdUser FROM RESERVED WHERE idReservSession='$idSession')");


if (!mysql_fetch_array($query0)) {

    exit;

}


else {

    while ($row = mysql_fetch_array($query0)) {

        // GET PERSON'S DETAILS
        $idUser=$row[0];
        $name=$row[1];
        $email=$row[2];
        $lang=$row[3];


        // GET CONFERENCE'S DETAILS
        $sessionName = "sessionName".$lang;
        $query=mysql_fetch_array(mysql_query("SELECT $sessionName, UNIX_TIMESTAMP(sessionDate),room FROM SESSIONS WHERE idSESSIONS='$idSession'"));
        $weekdaymysql=date("l",$query[1]);
        $monthmysql=date("F",$query[1]);
        $Day=date("d",$query[1]);
        $year=date("Y",$query[1]);
        $time=date("G",$query[1]);
        $W=$day[$weekdaymysql];
        $M=$month[$monthmysql];
        $fecha="$W, $Day of $M $year";
        $conference="$fecha<br><i>$query[2]</i><br>\"<b>$query[0]</b>\"<br><br>";


        // MAIL

        $link="<p><a href='http://localhost/SENCONFsvn/index.php' >INSCRÍBEME!</a></p>" ;

        $subject = $langVoc['mailSubject2'];
        $message = $langVoc['mail3A'].$name.$langVoc['mail3B'].$langVoc['mail3C'].$conference.$langVoc['mail3D'].
                $langVoc['mail3E'].$link.$langVoc['mail3F'].$langVoc['mail3G'];


        mail($email, $subject, $message, $headers);
        echo "ENVIADO!";

    }
}

?>