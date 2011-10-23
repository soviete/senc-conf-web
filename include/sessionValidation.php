<?php
function freePlaces ($idSession, $typeReg) 
    {

        $queryCount = mysql_query("select count(*) from formulario.REGISTERED WHERE formulario.REGISTERED.idRegSession = '$idSession'");
        $row = mysql_fetch_array($queryCount);
        $count = $row[0];
        echo "session $idSession has $count++++++++\n";
        
        if ($typeReg == "CA12_14")
            {
                if ($idSession == 2 | $idSession == 3 | $idSession == 4 )
                    {
                        if ($count <= 5)
                            {
                                return TRUE;
                            }
                        else
                            {
                                return FALSE;
                            }
                    }
                else
                    {
                        $queryCapacity = mysql_query("select  roomCapacity from formulario.SESSIONS WHERE formulario.SESSIONS.idSESSIONS = '$idSession'");
                        //select  roomCapacity from formulario.SESSIONS WHERE formulario.SESSIONS.idSESSIONS = '1';
                        $row = mysql_fetch_array($queryCapacity);
                        $capacity = $row[0];
                        
                        if ($count < $capacity)
                            {   
                                return TRUE;
                            }
                        else
                            {   
                                return FALSE;
                            }
                    }
            }
    
        else 
            {
                $queryCapacity = mysql_query("select  roomCapacity from formulario.SESSIONS WHERE formulario.SESSIONS.idSESSIONS = '$idSession'");
                $capacity = mysql_fetch_array($queryCapacity);
                    
                if ($count < $queryCapacity)
                    {
                        return TRUE;
                    }
                else
                    {
                        return FALSE;
                    }
            }
                                    
        }
?>
                                    