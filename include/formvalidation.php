<?php
function validChar($name) {
    if (preg_match("/^[a-zA-ZáàäéèëíïòóöùúüÀÁÄÈÉËÍÒÓÖÙÚÜÑñ ]+$/", $name)) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}
function validNum($dni) {
    if (preg_match("/^[0-9]+$/", $dni)) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}
function validEmail($email) {
    if (preg_match("/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $email)) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

function equalEmail($email1,$email2) {
    if ($email1 == $email2) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}


?>
