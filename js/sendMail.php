<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $firstName = htmlspecialchars($_POST['form_name']);
    $lastName = htmlspecialchars($_POST['form_lastname']);
    $phone = htmlspecialchars($_POST['form_phone']);
    $email = htmlspecialchars($_POST['form_email']);
    $enquiry = htmlspecialchars($_POST['form_enquiry']);
    $message = htmlspecialchars($_POST['form_message']);

    // Construct the email message
    $subject = "New Enquiry from $firstName $lastName";
    $body = "You have received a new message from your website contact form.\n\n";
    $body .= "Here are the details:\n";
    $body .= "First Name: $firstName\n";
    $body .= "Last Name: $lastName\n";
    $body .= "Phone: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Enquiry About: $enquiry\n";
    $body .= "Message: $message\n";

    $to = 'info@M&M Renovation.com';
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Send the email
    if(mail($to, $subject, $body, $headers)) {
        echo 'Thank you for your message. We will contact you soon.';
    } else {
        echo 'Sorry, there was an error sending your message. Please try again later.';
    }
} else {
    // Not a POST request
    header('Location: contact-form.html'); // Redirect to the form page
}
?>
