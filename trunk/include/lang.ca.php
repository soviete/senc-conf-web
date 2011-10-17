<?php

/*
  ------------------
  .Language: Spanish
  ------------------
.*/

$langVoc = array();

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

$day[0] = "Dilluns";
$day[1] = "Dimarts";
$day[2] = "Dimecres";
$day[3] = "Dijous";
$day[4] = "Divendres";
$day[5] = "Dissabte";
$day[6] = "Diumenge";

$month[0] = "Gener";
$month[1] = "Febrer";
$month[2] = "Març";
$month[3] = "Abril";
$month[4] = "Maig";
$month[5] = "Juny";
$month[6] = "Juliol";
$month[7] = "Agost";
$month[8] = "Setembre";
$month[9] = "Octubre";
$month[10] = "Novembre";
$month[11] = "Desembre";

//ERROR SESSIONS
$langVoc['numSessionsMsg1'] = 'El número de conferències que has triat '; 
$langVoc['numSessionsMsg2'] = ' no correspon a l\'opció d\'incripció triada, has d\'escollir ';
$langVoc['back'] = 'enrere';
$langVoc['backMsg'] = 'al formulari d\'inscripció a conferències';

//ERROR REGISTRATION FORM
$langVoc['back'] = '<b>Si us plau, torni a intentar-ho.<br><a href=index.php>ENRERE</a></b>';
$langVoc['emptyfield'] = '<h4>ERROR!</h4>Revisi el formulari, potser hi ha camps buits<br>'.$langVoc['back'];
$langVoc['nameError'] = '<h4>ERROR!</h4><br><h4>El camp <i>Nom</i> només pot contenir text</h4>
    <br>'.$langVoc['back'];
$langVoc['surnameError'] = '<h4>ERROR!</h4><br><h4>El camp <i>Cognom</i> només pot contenir text</h4>
    <br>'.$langVoc['back'];
$langVoc['dniError'] = '<h4>ERROR!</h4><br><h4>El camp <i>DNI/Passport només</i> pot contenir caràcters numèrics</h4>
    <br>'.$langVoc['back'];
$langVoc['emailError'] = '<h4>ERROR!</h4><br><h4>L\'adreça d\'email és invàlida</h4>
    <br>'.$langVoc['back'];



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