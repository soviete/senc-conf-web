<?php
function validChar($name) {
    if (preg_match("/^[a-zA-Z ]+$/", $name)) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}
?>