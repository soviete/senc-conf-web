<?php

/*
  ------------------
  .Language: Spanish
  ------------------
.*/

$langVoc = array();

//INFO CONFERENCES
$langVoc['regInfoTitle'] = 'Información pre-inscripción';
$langVoc['regInfo'] = 'Bienvenido a la pre-inscripción a las sesiones de “El Cerebro Invade la Ciudad”. Esta pre-inscripción 
                       tiene como objetivo efectuar una reserva de plaza en los diferentes eventos que conforman el programa. 
                       Esta reserva es necesaria porque las plazas son limitadas y su número depende de cada una de las sedes: 
                       si estás interesado en asistir, te recomendamos que efectúes esta reserva para asegurarte un sitio.';
$langVoc['procedureReg'] = 'El procedimiento de pre-inscripción será el siguiente:';
$langVoc['procedureReg1'] = 'Una vez que nos hayas dado tus datos, selecciona en el menú aquellas sesiones a las que querrás asistir';
$langVoc['procedureReg2'] = 'La base de datos recogerá tu solicitud y te enviará un mensaje confirmando si tienes una plaza o si 
                             bien debido al aforo completo has entrado en la lista de espera';
$langVoc['procedureReg3'] = 'Si has obtenido plaza, una semana antes del acto te pediremos que confirmes tu asistencia. Importante: 
                             aquellas plazas no confirmadas en un plazo de 96 horas serán liberadas para la lista de espera';
$langVoc['procedureReg4'] = 'Si quedaste en la lista de espera, tres días antes del acto os ofreceremos las plazas liberadas 
                             al global de las personas incluídas en la misma; estas plazas serán adjudicadas por orden de confirmación.';

$langVoc['Terms0'] = 'TERMS & CONDITIONS';
$langVoc['Terms1'] = 'Para continuar el registro por favor lea y accepte ';
$langVoc['Terms2'] = 'En cumplimiento de lo dispuesto en la LO 15/99 de Protección de Datos de Carácter Personal,
la SOCIEDAD ESPAÑOLA DE NEUROCIENCIA le comunica que los datos de carácter personal que nos facilite
serán incluidos en un fichero automatizado propiedad de la Sociedad para darles el tratamiento legal
debido y con uso exclusivo del destino para el que los facilitó. Asimismo le informamos de la posibilidad
de ejercitar su derecho de acceso, rectificación, cancelación y oposición, mediante comunicación escrita
dirigida a la SOCIEDAD ESPAÑOLA DE NEUROCIENCIA por correo electrónico dirigido a <a href="mailto:secretaria.tecnica@senc.es?subject=Feedback" >secretaria.tecnica@senc.es</a>
<br><br>
La SOCIEDAD ESPAÑOLA DE NEUROCIENCIA ha adoptado los niveles de seguridad de protección de datos de carácter
personal legalmente requeridos, y ha instalado todos los medios y medidas técnicas a su alcance para evitar
la pérdida, mal uso, alteración, acceso no autorizado y robo de los datos facilitados.<br><br>
La SOCIEDAD ESPAÑOLA DE NEUROCIENCIA no comunicará los datos que le facilitan los usuarios a ninguna otra
sociedad o entidad.';

$langVoc['TermsButton'] = 'Acepto';

$langVoc['startReg'] = 'Entrar';

//TITLE
$langVoc['conferenceReg'] = 'Registro a conferencias';

//header
$langVoc['registration']='Inscripción';

//Form 
$langVoc['formTitle'] = 'Formulario de inscripción a conferencias';
$langVoc['formSubTitle'] = 'Paso 1 - Por favor rellene los campos siguientes:';
$langVoc['formName'] = 'Nombre';
$langVoc['formSurname'] = 'Apellido';
$langVoc['formId'] = 'DNI/Pasaporte* <br><small>(sólo caracteres numéricos)</small>';
$langVoc['formEmail'] = 'Email';
$langVoc['formEmailConfirm'] = 'Confirmación Email';
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

$day['Monday'] = "Lunes";
$day['Tuesday'] = "Martes";
$day['Wednesday'] = "Miércoles";
$day['Thursday'] = "Jueves";
$day['Friday'] = "Viernes";
$day['Saturday'] = "Sábado";
$day['Sunday'] = "Domingo";

$month['January'] = "Enero";
$month['Febraury'] = "Febrero";
$month['March'] = "Marzo";
$month['April'] = "Abril";
$month['May'] = "Mayo";
$month['June'] = "Junio";
$month['July'] = "Julio";
$month['August'] = "Agosto";
$month['September'] = "Septiembre";
$month['October'] = "Octubre";
$month['November'] = "Noviembre";
$month['December'] = "Diciembre";

//ERROR REGISTRATION FORM

$langVoc['back'] = '<b>Por favor, vuelva a intentarlo.<br><a href=dataForm.php>ATRÁS</a></b>';
$langVoc['emptyfield'] = '<h4>ERROR!</h4>Revise el formulario. Puede que haya campos vacíos<br>'.$langVoc['back'];
$langVoc['nameError'] = '<h4>ERROR!</h4><br><h4>El campo <i>Nombre</i> sólo puede contener texto</h4>
    <br>'.$langVoc['back'];
$langVoc['surnameError'] = '<h4>ERROR!</h4><br><h4>El campo <i>Apellido</i> sólo puede contener texto</h4>
    <br>'.$langVoc['back'];
$langVoc['dniError'] = '<h4>ERROR!</h4><br><h4>El campo <i>DNI/Pasaporte només</i> pot contenir caràcters numèrics</h4>
    <br>'.$langVoc['back'];
$langVoc['emailError'] = '<h4>ERROR!</h4><br><h4>La dirección de email no es válida</h4><br>'.$langVoc['back'];
$langVoc['emailErrorConf'] = '<h4>ERROR!</h4><br><h4>La dirección de email confirmado no es válida</h4><br>'.$langVoc['back'];
$langVoc['emailNotMatch'] = '<h4>ERROR!</h4><br><h4>Confirmación de email errónea</h4>
    <br>'.$langVoc['back'];

//ERROR SESSIONS
$langVoc['numSessionsMsg1'] = 'El número de conferencias que has escogido '; 
$langVoc['numSessionsMsg2'] = ' no corresponde con la opción de inscripción que has solicitado, tienes que coger ';
$langVoc['back1'] = 'VOLVER';
$langVoc['backMsg'] = 'al formulario de inscripción a conferencias';
$langVoc['sessionExpired'] = 'La sesión expiró. Por favor empiece de nuevo';

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