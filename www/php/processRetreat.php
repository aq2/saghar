<?php
// javascript validation should have been done before reaching this file

// load php validation functions to double-check for hackery
require_once('validators.php');

// read and sanitise form questions
$formName = safify($_POST['name']);
$formTel = safify($_POST['tel']);
$formEmail = safify($_POST['email']);
$formTickets = safify($_POST['tickets']);
$formSubject = safify($_POST['subject']);

// no fields can be empty, email address must be valid
// check that tickets are ok??
// honeypot?
// overkill?
// lazy man decision: what till it's spammed...


// prepare email body text
$emailBody = '<h1>Joyful Living Retreat reply</h1>'
           . "<h2>Name: $formName </h2>"
           . "<h2>Phone: $formTel </h2>"
           . "<h2>Email: $formEmail </h2>"
           . "<h2>Workshop: $formSubject </h2>"
           . "<h2>Tickets: $formTickets </h2>"
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
  switch ($formTickets) {
    case "single_full":
      print $blah . "AUZV8G6L3BFDG" . "'>";
      break;
    case "single_remainder":
      print $blah . "WA5DY9NUE6STG" . "'>";
      break;
    case "couple_full":
      print $blah . "JJM5P7V3RJFC6" . "'>";
      break;
    case "couple_remainder":
      print $blah . "QYXWZDTR789WQ" . "'>";
      break;
    case "deposit":
      print $blah . "LRAG53F5JG2CW" . "'>";
      break;
    default:
      echo "something's gone awry!";
  }
} else {
  print "<meta http-equiv='refresh' content='0;URL=../pages/formError.html'>";
}


?>
