<?php

/*
  ------------------
  .language: English
  ------------------
.*/

$langVoc = array();

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

$day[0] = "Monday";
$day[1] = "Tuesday";
$day[2] = "Wednesday";
$day[3] = "Thursday";
$day[4] = "Friday";
$day[5] = "Sunday";
$day[6] = "Saturday";

$month[0] = "January";
$month[1] = "February";
$month[2] = "March";
$month[3] = "April";
$month[4] = "May";
$month[5] = "June";
$month[6] = "July";
$month[7] = "August";
$month[8] = "September";
$month[9] = "October";
$month[10] = "November";
$month[11] = "December";

//ERROR SESSIONS

$langVoc['numSessionsMsg1'] = 'The number of conferences you choose '; 
$langVoc['numSessionsMsg2'] = ' does not match your registration option, you should chose ';
$langVoc['back'] = 'back';
$langVoc['backMsg'] = 'to the conferences registration form';

//ERROR REGISTRATION FORM

$langVoc['back'] = '<b>Please go back and try again.<br><a href=index.php>BACK</a></b>';
$langVoc['emptyfield'] ='<h4>ERROR!</h4>A field in the form is missing!<br>'.$langVoc['back'];
$langVoc['nameError'] = '<h4>ERROR!</h4><br><h4>Only characters in the field <i>Name</i></h4>
    <br>'.$langVoc['back'];
$langVoc['surnameError'] = '<h4>ERROR!</h4><br><h4>Only characters in the field <i>Surname</i></h4>
    <br>'.$langVoc['back'];
$langVoc['dniError'] = '<h4>ERROR!</h4><br><h4>The field <i>DNI/Passport</i> must contain only numeric characters</h4>
    <br>'.$langVoc['back'];
$langVoc['emailError'] = '<h4>ERROR!</h4><br><h4>You have inserted an invalid e-mail address</h4>
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