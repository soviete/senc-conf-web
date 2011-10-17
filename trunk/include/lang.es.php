<?php

/*
  ------------------
  .Language: Spanish
  ------------------
.*/

$langVoc = array();

//header
$langVoc['registration']='Inscripción';

//Form 
$langVoc['formTitle'] = 'Formulario de inscripción a conferencias';
$langVoc['formSubTitle'] = 'Paso 1 - Por favor rellene los campos siguientes:';
$langVoc['formName'] = 'Nombre';
$langVoc['formSurname'] = 'Apellido';
$langVoc['formId'] = 'DNI/Pasaporte* <br><small>(sólo caracteres numéricos)</small>';
$langVoc['formEmail'] = 'Email';
$langVoc['formRegOption'] = 'Opción de inscripción';
$langVoc['formRegOption1'] = 'Me inscribiré a 12 conferencias';
$langVoc['formRegOption2'] = 'Me inscribiré a 8 conferencias';
$langVoc['formRegOption3'] = 'Sólo me inscribiré a 1 conferencia';
$langVoc['formNextButton'] = 'Siguiente';

$langVoc['mandatoryField'] = 'Campos obligatorios';
$langVoc['register'] = 'Inscríbete!';

//Registration Conferences
$langVoc['formChoose'] ='Paso 2 - Escoja las conferencias a las que desea asistir:';
//$langVoc['remindChoose'] ='2 - Elige al menos una conferencia esta vez!!!';
$langVoc['regDetails'] = "DETALLES DE INSCRIPCIÓN";
$langVoc['noConfSelect'] = 'No has seleccionado ninguna conferencia';



//DAY & MONTH

$day[0] = "Lunes";
$day[1] = "Martes";
$day[2] = "Miércoles";
$day[3] = "Jueves";
$day[4] = "Viernes";
$day[5] = "Sábado";
$day[6] = "Domingo";

$month[0] = "Enero";
$month[1] = "Febrero";
$month[2] = "Marzo";
$month[3] = "Abril";
$month[4] = "Mayo";
$month[5] = "Junio";
$month[6] = "Julio";
$month[7] = "Agosto";
$month[8] = "Septiembre";
$month[9] = "Octubre";
$month[10] = "Noviembre";
$month[11] = "Diciembre";

//ERROR REGISTRATION FORM

$langVoc['back'] = '<b>Por favor, vuelva a intentarlo.<br><a href=index.php>ATRÁS</a></b>';
$langVoc['emptyfield'] = '<h4>ERROR!</h4>Revise el formulario. Puede que haya campos vacíos<br>'.$langVoc['back'];
$langVoc['nameError'] = '<h4>ERROR!</h4><br><h4>El campo <i>Nombre</i> sólo puede contener texto</h4>
    <br>'.$langVoc['back'];
$langVoc['surnameError'] = '<h4>ERROR!</h4><br><h4>El campo <i>Apellido</i> sólo puede contener texto</h4>
    <br>'.$langVoc['back'];
$langVoc['dniError'] = '<h4>ERROR!</h4><br><h4>El campo <i>DNI/Pasaporte només</i> pot contenir caràcters numèrics</h4>
    <br>'.$langVoc['back'];
$langVoc['emailError'] = '<h4>ERROR!</h4><br><h4>La dirección de email es inválida</h4><br>'.$langVoc['back'];

//ERROR SESSIONS
$langVoc['numSessionsMsg1'] = 'El número de conferencias que has escogido '; 
$langVoc['numSessionsMsg2'] = ' no corresponde con la opción de inscripción que has solicitado, tienes que coger ';
$langVoc['back'] = 'volver';
$langVoc['backMsg'] = 'al formulario de inscripción a conferencias'; 

//ERROR USER ALREADY REGISTERED
$langVoc['userRegistered'] = 'Este usuario ya está registrado!';
$langVoc['pleaseRetry'] = 'Por favor inténtelo de nuevo. ';

//AddUser USER CORRECTLY REGISTERED
$langVoc['congra'] = 'Enhorabuena ';
$langVoc['congra1'] = '!! Te has registrado correctamente';
$langVoc['congra2'] ='Pronto recibirás un email con la confirmación.';
$langVoc['noSessionAva'] = 'No hay suficientes plazas disponibles';
$langVoc['waitList'] = 'Si quieres pasar a nuestra lista de espera apreta ';
$langVoc['Here'] = 'aquí';
$langVoc['asap'] = 'Nos pondremos en contacto contigo tan pronto como haya plazas disponibles.';
?>