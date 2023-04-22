<?php

require_once('validators.php');

// read and sanitize form responses
$form_name = safify($_POST['name']);
$form_tel = safify($_POST['tel']);
$form_email = safify($_POST['email']);
$form_tickets = safify($_POST['tickets']);
$form_subject = safify($_POST['subject']);


// prepare email body text
$emailBody = '<h1>Yoga workshop reply</h1>'
           . "<h2>Name: $form_name </h2>"
           . "<h2>Email: $form_email </h2>"
           . "<h2>Yoga Classes: $form_subject </h2>"
           . "<h2>Tickets: $form_tickets </h2>"
           . '<br><br>'
           . '<p>Hi Saghar, little message from angelo...</p>'
           . '<p>This email only means that someone has filled in the yoga workshop form.</p>'
           . '<p>It DOES NOT mean that they have paid.</p>'
           . '<p>PayPal will send you another email when they have paid.</p>';

$emailSubject = $form_subject;
$successPage = '../pages/contactThanks.html';


// now mail this!
require_once('mailThis.php');


if ($success) {
  // transer to paypal payment page
  $blah = "<meta http-equiv='refresh' content='0;url=https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=";


  switch ($form_tickets) {
    case "single_class":
      print $blah . "43KLLNELDUZ24" . "'>";
      break;
    case "monthly_class":
      print $blah . "9X7ZJKL8PKAJ2" . "'>";
      break;
    default:
      echo "something's gone awry!";
  }

} else {
  print "<meta http-equiv='refresh' content='0;URL=../pages/formError.html'>";
}


?>
