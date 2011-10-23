<?php

/*
  ------------------
  .Language: Spanish
  ------------------
.*/

$langVoc = array();

//INFO CONFERENCES
$langVoc['regInfoTitle'] = 'Informació pre-inscripció';
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

$langVoc['TermsButton'] = 'Accepto';

$langVoc['startReg'] = 'Entrar';


//TITLE
$langVoc['conferenceReg'] = 'Registre a Conferències';

//header
$langVoc['registration']='Inscripció';

//Form
$langVoc['formTitle'] = 'Formulari d\'inscripció a conferències';
$langVoc['formSubTitle'] = 'Pas 1 - Si us plau, ompliu el següents camps:';
$langVoc['formName'] = 'Nom';
$langVoc['formSurname'] = 'Cognom';
$langVoc['formId'] = 'DNI/Passaport* <br><small>(nomes caràcters numerics)</small>';
$langVoc['formEmail'] = 'Email';
$langVoc['formEmailConfirm'] = 'Confirmació Email';
$langVoc['formRegOption'] = 'Opció d\'inscripció';
$langVoc['formRegOption1'] = 'M\'inscriuré a 12 conferències';
$langVoc['formRegOption2'] = 'M\'inscriuré a 8 conferències';
$langVoc['formRegOption3'] = 'M\'inscriuré a nomes 1 conferèncie';
$langVoc['formNextButton'] = 'Següent';

$langVoc['mandatoryField'] = 'Camps obligatoris';
$langVoc['register'] = "Inscriura't!";

//Registration Conferences
$langVoc['formChoose'] ='Pas 2 - Triï les conferències a les quals assistirà:';
//$langVoc['remindChoose'] ='2 - Recorda, tria almenys una conferència aquesta vegada!!!';
$langVoc['regDetails'] = "DETALLS D'INSCRIPCIÓ";
$langVoc['noConfSelect'] = 'No has seleccionat cap conferència';

//

//DAY & MONTH

$day['Monday'] = "Dilluns";
$day['Tuesday'] = "Dimarts";
$day['Wednesday'] = "Dimecres";
$day['Thursday'] = "Dijous";
$day['Friday'] = "Divendres";
$day['Saturday'] = "Dissabte";
$day['Sunday'] = "Diumenge";

$month['January'] = "Gener";
$month['February'] = "Febrer";
$month['March'] = "Març";
$month['April'] = "Abril";
$month['May'] = "Maig";
$month['June'] = "Juny";
$month['July'] = "Juliol";
$month['August'] = "Agost";
$month['September'] = "Setembre";
$month['October'] = "Octubre";
$month['November'] = "Novembre";
$month['December'] = "Desembre";

//ERROR SESSIONS
$langVoc['numSessionsMsg1'] = 'El número de conferències que has triat '; 
$langVoc['numSessionsMsg2'] = ' no correspon a l\'opció d\'incripció triada, has d\'escollir ';
$langVoc['back1'] = 'TORNAR';
$langVoc['backMsg'] = 'al formulari d\'inscripció a conferències';
$langVoc['sessionExpired'] = 'La sessió ha caducat. Si us plau, torni a començar';

//ERROR NO SESSIONS CHOSEN
$langVoc['NoSessions'] = 'Has de triar alguna conferència!'; 

//ERROR REGISTRATION FORM
$langVoc['back'] = '<b>Si us plau, torni a intentar-ho.<br><a href=dataForm.php>ENRERE</a></b>';
$langVoc['emptyfield'] = '<h4>ERROR!</h4>Revisi el formulari, potser hi ha camps buits<br>'.$langVoc['back'];
$langVoc['nameError'] = '<h4>ERROR!</h4><br><h4>El camp <i>Nom</i> només pot contenir text</h4>
    <br>'.$langVoc['back'];
$langVoc['surnameError'] = '<h4>ERROR!</h4><br><h4>El camp <i>Cognom</i> només pot contenir text</h4>
    <br>'.$langVoc['back'];
$langVoc['dniError'] = '<h4>ERROR!</h4><br><h4>El camp <i>DNI/Passport només</i> pot contenir caràcters numèrics</h4>
    <br>'.$langVoc['back'];
$langVoc['emailError'] = '<h4>ERROR!</h4><br><h4>L\'adreça d\'email és no vàlida</h4>
    <br>'.$langVoc['back'];
$langVoc['emailErrorConf'] = '<h4>ERROR!</h4><br><h4>L\'adreça d\'email confirmada és no vàlida</h4>
    <br>'.$langVoc['back'];
$langVoc['emailNotMatch'] = '<h4>ERROR!</h4><br><h4>Confirmació de emails errònia</h4>
    <br>'.$langVoc['back'];

//PARTIAL SESSION AVAILABILITY
$langVoc['partialSessionAva'] = 'Ho sentim. Algunes de les conferències escollides no tenen places disponibles.';
$langVoc['session2RegMsg'] = 'Aquestes són les conferències a les que et pots registrar directament:';
$langVoc['session2ReservMsg'] = 'Aquestes són les conferències a les que pots passar a la llista d\'espera. En cas de disponibilitat de places
                                t\'enviarem un mail perquè puguis fer la inscripció:';
$langVoc['acceptPartialReg'] = 'Si estàs d\'acord fes click ';

//ERROR USER ALREADY REGISTERED
$langVoc['userRegistered'] = 'Aquest usuari ja està registrat!';
$langVoc['pleaseRetry'] = 'Si us plau, torni a intentar-ho. ';

//AddUser USER CORRECTLY REGISTERED
$langVoc['congra'] = 'Enhorabona ';
$langVoc['congra1'] = '!! T\'has registrat correctament';
$langVoc['congra2'] = 'En breu rebràs un email amb la confirmació.';    
$langVoc['noSessionAva'] = 'No hi ha prou places disponibles';
$langVoc['waitList'] = 'Si vols passar a la nostra llista d\'espera prem ';
$langVoc['Here'] = 'aquí';
$langVoc['asap'] = 'Ens posarem en contacte amb tu tan aviat com hi hagi places lliures.';
?>