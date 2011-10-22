<?php

/*
  ------------------
  .language: English
  ------------------
.*/

$langVoc = array();

$langVoc['regInfoTitle'] = 'Registration info';
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

$langVoc['TermsButton'] = 'Accept';

$langVoc['startReg'] = 'Go';
//TITLE
$langVoc['conferenceReg'] = 'Conferences Registration';

//header
$langVoc['registration']='Registration';

//Form
$langVoc['formTitle'] = 'Conferences registration form';
$langVoc['formSubTitle'] = 'Step 1 - Please fill the following fields:';
$langVoc['formName'] = 'Name';
$langVoc['formSurname'] = 'Surname';
$langVoc['formId'] = 'DNI/Passport* <br><small>(no characters allowed)</small>';
$langVoc['formEmail'] = 'Email';
$langVoc['formEmailConfirm'] = 'Email confirmation';
$langVoc['formRegOption'] = 'Registration option';
$langVoc['formRegOption1'] = 'I will register to 12 conferences';
$langVoc['formRegOption2'] = 'I will register to 8 conferences';
$langVoc['formRegOption3'] = 'I will just register to 1 conference';
$langVoc['formNextButton'] = 'Next';
$langVoc['mandatoryField'] = 'Next';


$langVoc['mandatoryField'] = 'Mandatory fields';
$langVoc['register'] = 'Register!';

//Registration Conferences
$langVoc['formChoose'] ='Step 2 - Choose the conferences you would like to attend:';
//$langVoc['remindChoose'] ='2 - Choose at least one conference this time!!!';
$langVoc['regDetails'] = "REGISTRATION DETAILS";
$langVoc['noConfSelect'] = 'You have not choose any conference';


// Menu

$langVoc['MENU_HOME'] = 'Home';
$langVoc['MENU_ABOUT_US'] = 'About Us';
$langVoc['MENU_OUR_PRODUCTS'] = 'Our products';
$langVoc['MENU_CONTACT_US'] = 'Contact Us';
$langVoc['MENU_ADVERTISE'] = 'Advertise';
$langVoc['MENU_SITE_MAP'] = 'Site Map';

//DAY & MONTH

$day['Monday'] = "Monday";
$day['Tuesday'] = "Tuesday";
$day['Wednesday'] = "Wednesday";
$day['Thursday'] = "Thursday";
$day['Friday'] = "Friday";
$day['Sunday'] = "Sunday";
$day['Saturday'] = "Saturday";

$month['January'] = "January";
$month['February'] = "February";
$month['March'] = "March";
$month['April'] = "April";
$month['May'] = "May";
$month['June'] = "June";
$month['July'] = "July";
$month['August'] = "August";
$month['September'] = "September";
$month['October'] = "October";
$month['November'] = "November";
$month['December'] = "December";

//ERROR SESSIONS

$langVoc['numSessionsMsg1'] = 'The number of conferences you choose '; 
$langVoc['numSessionsMsg2'] = ' does not match your registration option, you should chose ';
$langVoc['back1'] = 'BACK';
$langVoc['backMsg'] = 'to the conferences registration form';

//ERROR REGISTRATION FORM

$langVoc['back'] = '<b>Please go back and try again.<br><a href=dataForm.php>BACK</a></b>';
$langVoc['emptyfield'] ='<h4>ERROR!</h4>A field in the form is missing!<br>'.$langVoc['back'];
$langVoc['nameError'] = '<h4>ERROR!</h4><br><h4>Only characters in the field <i>Name</i></h4>
    <br>'.$langVoc['back'];
$langVoc['surnameError'] = '<h4>ERROR!</h4><br><h4>Only characters in the field <i>Surname</i></h4>
    <br>'.$langVoc['back'];
$langVoc['dniError'] = '<h4>ERROR!</h4><br><h4>The field <i>DNI/Passport</i> must contain only numeric characters</h4>
    <br>'.$langVoc['back'];
$langVoc['emailError'] = '<h4>ERROR!</h4><br><h4>You have inserted an invalid e-mail address</h4>
    <br>'.$langVoc['back'];
$langVoc['emailErrorConf'] = '<h4>ERROR!</h4><br><h4>You have inserted an invalid e-mail confirmation address</h4>
    <br>'.$langVoc['back'];
$langVoc['emailNotMatch'] = '<h4>ERROR!</h4><br><h4>E-mail confirmation failed</h4>
    <br>'.$langVoc['back'];

//ERROR USER ALREADY REGISTERED
$langVoc['userRegistered'] = 'This user is already registered!';
$langVoc['pleaseRetry'] = 'Please try again. '; 

//AddUser USER CORRECTLY REGISTERED
$langVoc['congra'] = 'Congratulations ';
$langVoc['congra1'] = '!! You have correctly registered' ;
$langVoc['congra2'] ='Soon you will receive a confirmation email.';
$langVoc['noSessionAva'] = 'There are no places available';
$langVoc['waitList'] = 'If you want to pass to our waiting list click ';
$langVoc['Here'] = 'here';
$langVoc['asap'] = 'We will get in touch with you as soon as there are empty slots.';