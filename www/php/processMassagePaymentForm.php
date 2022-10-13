<?php
// javascript validation should have been done before reaching this file

// load php validation functions to double-check for hackery
require_once('validators.php');

// read and sanitise form questions
$formName = safify($_POST['name']);
// $formTel = safify($_POST['tel']);
$formEmail = safify($_POST['email']);
$formDate = safify($_POST['date']);
$formType = safify($_POST['type']);
$formSubject = safify($_POST['subject']);

// no fields can be empty, email address must be valid
// check that tickets are ok??
// honeypot?
// overkill?
// lazy man decision: what till it's spammed...


// prepare email body text
$emailBody = '<h1>Massage Payment reply</h1>'
           . "<h2>Name: $formName </h2>"
           . "<h2>Email: $formEmail </h2>"
           . "<h2>Approx Date: $formDate </h2>"
           . "<h2>Massage Type: $formType</h2>"
           . '<br><br>'
           . '<p>Hi Saghar, little message from angelo...</p>'
           . '<p>This email only means that someone has filled in the workshop form.</p>'
           . '<p>It DOES NOT mean that they have paid.</p>'
           . '<p>PayPal will send you another email when they have paid.<\p>';


$emailSubject = $formSubject;
$successPage = '../pages/contactThanks.html';

// now mail this!
require_once('mailThis.php');

if ($success) {
  // transer to paypal payment page
  $blah = "<meta http-equiv='refresh' content='0;url=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=";
  switch ($formType) {
    case "head":
      print $blah . "LYLSBJEL3H6AL" . "'>";
      break;
    case "back":
      print $blah . "359H5F45CNKCY" . "'>";
      break;
    case "full":
      print $blah . "URFRBTRYHXVKY" . "'>";
      break;
    case "deluxe":
      print $blah . "SHQ2NLSHNLLCJ" . "'>";
      break;
    default:
      echo "something's gone awry!";
  }
} else {
  print "<meta http-equiv='refresh' content='0;URL=../pages/formError.html'>";
}


?>
