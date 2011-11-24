<?php
function freePlaces ($idSession, $typeReg) {

    $queryCount = mysql_query("select count(*) from formulario.REGISTERED WHERE
                formulario.REGISTERED.idRegSession = '$idSession'");

    $row = mysql_fetch_array($queryCount);
    $count = $row[0];

    $queryCount1 = mysql_query ("SELECT COUNT(*) from formulario.REGISTERED
                                    WHERE formulario.REGISTERED.regIdUser
                                    IN (SELECT formulario.USERS.idUser from formulario.USERS
            where formulario.USERS.type= 'C12' OR formulario.USERS.type= 'C8') AND
            formulario.REGISTERED.idRegSession = '$idSession'");

    $row1 = mysql_fetch_array($queryCount1);
    $count1 = $row1[0];

    $queryCapacity = mysql_query("select  roomCapacity from formulario.SESSIONS
            WHERE formulario.SESSIONS.idSESSIONS = '$idSession'");
    $row2 = mysql_fetch_array($queryCapacity);
    $capacity = $row2[0];

    if ($typeReg == "C12") {

        if ($idSession == 2 | $idSession == 3 | $idSession == 4 | $idSession == 5 ) {
            if ($count < $capacity && $count1 <= 75) {
                return TRUE;
            }

            else {
                return FALSE;
            }
        }
        else {
//                        $queryCapacity = mysql_query("select  roomCapacity from formulario.SESSIONS WHERE formulario.SESSIONS.idSESSIONS = '$idSession'");
//                        $row = mysql_fetch_array($queryCapacity);
//                        $capacity = $row[0];

            if ($count < $capacity) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
    }

    elseif ($typeReg == "C8") {
        if ($idSession == 2 | $idSession == 3 | $idSession == 4 | $idSession == 5 ) {

            if ($count < $capacity && $count1 <= 75) {
                return TRUE;
            }

            else {
                return FALSE;
            }
        }
        else {
//                        $queryCapacity = mysql_query("select  roomCapacity from formulario.SESSIONS WHERE formulario.SESSIONS.idSESSIONS = '$idSession'");
//                        $row = mysql_fetch_array($queryCapacity);
//                        $capacity = $row[0];

            if ($count < $capacity) {
                return TRUE;
            }
            else {
                return FALSE;
            }
        }
    }

    else {
//                $queryCapacity = mysql_query("select  roomCapacity from formulario.SESSIONS WHERE formulario.SESSIONS.idSESSIONS = '$idSession'");
//                $row = mysql_fetch_array($queryCapacity);
//                $capacity = $row[0];

        if ($count < $capacity) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }

}


function freePlacesmail3 ($idSession) {
    $queryCount = mysql_query("select count(*) from formulario.CONFIRMED WHERE
                formulario.CONFIRMED.idConfSession = '$idSession'");

    $row = mysql_fetch_array($queryCount);
    $count = $row[0];

    $queryCapacity = mysql_query("select  roomCapacity from formulario.SESSIONS
            WHERE formulario.SESSIONS.idSESSIONS = '$idSession'");
    $row2 = mysql_fetch_array($queryCapacity);
    $capacity = $row2[0];

    if ($count < $capacity) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

?>
