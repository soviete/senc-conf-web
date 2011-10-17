<?php 
/* ASSIGNING LANGUAGE VARIABLES */

header('Cache-control: private'); // IE 6 FIX

if(isSet($_GET['lang'])) {
    $lang = $_GET['lang'];

    // register the session and set the cookie
    $_SESSION['lang'] = $lang;

    setcookie('lang', $lang, time() + (3600 * 24 * 30));
}

else if(isSet($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
}

else if(isSet($_COOKIE['lang'])) {
    $lang = $_COOKIE['lang'];
}

else {
    $lang = 'ca';
}

switch ($lang) {
    case 'en':
        $lang_file = 'lang.en.php';
        break;

    case 'ca':
        $lang_file = 'lang.ca.php';
        break;

    case 'es':
        $lang_file = 'lang.es.php';
        break;

    default:
        $lang_file = 'lang.ca.php';

}

include_once 'include/'.$lang_file;
?>

<?php
/* Function to get the current page name*/
function currentPage() {
    return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

/* Function for redirecting to a different page in the current directory */
function redirect ($page) {
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = $page;
    header("Location: http://$host$uri/$extra");
    exit;
}
?>