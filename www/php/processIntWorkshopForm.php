<?php

require_once('validators.php');

// read and sanitise form questions
$form_name = safify($_POST['name']);
$form_gender = safify($_POST['gender']);
$form_age = safify($_POST['age']);
$form_tel = safify($_POST['tel']);
$form_email = safify($_POST['email']);
$form_health = safify($_POST['health']);
$form_meds = safify($_POST['medic']);
$form_workshops = safify($_POST['wksh']);
$form_quals = safify($_POST['quals']);
$form_subject = safify($_POST['subject']);
$form_date = safify($_POST['date']);
$form_place = safify($_POST['place']);
$form_address = safify($_POST['address']);
$form_mapRef = safify($_POST['iframeSrc']);


// prepare email body text
$emailBody = '<h1>Intensive workshop application</h1>'
           . "<h2>Name: $form_name </h2>"
           . "<h2>Gender: $form_gender </h2>"
           . "<h2>Age: $form_age </h2>"
           . "<h2>Phone: $form_tel </h2>"
           . "<h2>Email: $form_email </h2>"
           . "<h2>Health Conditions:  $form_health </h2>"
           . "<h2>Medications:  $form_meds </h2>"
           . "<h2>Workshop already done: $form_workshops </h2>"
           . "<h2>Qualifications: $form_quals </h2>"
           . "<h2>Workshop applied for: $form_place, $form_date </h2>"
           . '<br><br>'
           . '<h3>Hi Saghar, little message from angelo...</h3>'
           . '<h3>This email means that someone has applied for intensive workshop training.</h3>'
           . '<h3>You now have to approve or reject them.</h3>';


// now build up info to appear in link to approve
$request = 'http://ayurvedicyogamassage.org.uk';

$linka = $request . '/pages/vet.html'
       . '?name=' . $form_name
       . '&gender=' . $form_gender
       . '&age=' . $form_age
       . '&tel=' . $form_tel
       . '&email=' . $form_email
       . '&health=' . $form_health
       . '&meds=' . $form_meds
       . '&workshops=' . $form_workshops
       . '&quals=' . $form_quals
       . '&subject=' . $form_subject
       . '&place=' . $form_place
       . '&date=' . $form_date
       . '&address=' . $form_address
       . '&mapRef=' . $form_mapRef;

$emailBody .= '<h2><button><a href=\'' . $linka . '\'>click here</a></button></h2>';

$emailSubject = $form_subject;
$successPage = '../pages/intensiveThanks.html';

// now mail this!
require_once('mailThis.php');


?>
