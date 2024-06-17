<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $subject = htmlspecialchars(strip_tags(trim($_POST['subject'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    $to = "9879593339c@gmail.com";
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";

    $email_subject = "New Contact Form Submission: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Here are the details:\n\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Subject: $subject\n" .
                  "Message:\n$message";

    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect to a thank you page or show a success message
        echo "Thank you for contacting us. We will get back to you shortly.";
    } else {
        // Show an error message
        echo "There was an error sending your message. Please try again later.";
    }
} else {
    // Show an error message if the form was not submitted correctly
    echo "There was an error with your submission. Please try again.";
}
?>
