<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Collect form data
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $email_subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
  $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

  // Set email properties
  $to = 'minakaram13@gmail.com';
  $subject = $email_subject";
  $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
            'Content-Type: text/plain; charset=UTF-8';

  // Prepare message body
  $body = "Name: $name\n";
  $body .= "Email: $email\n\n";
  $body .= "Message:\n$message";

  // Send email
  if (mail($to, $subject, $body, $headers)) {
    echo 'Thank you for contacting us! We will get back to you soon.';
  } else {
    echo 'There was an error sending your message. Please try again later.';
  }

} else {
  // This script should only be accessed through POST method (form submission)
  echo 'Invalid request.';
}

?>
