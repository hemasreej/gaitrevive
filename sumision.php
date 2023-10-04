<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Validate form data (you can add more validation as needed)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all fields.";
        // You might want to redirect back to the form page or handle the error in a different way.
        exit;
    }

    // Process the form data (you can customize this part based on your needs)
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "New Form Submission";
    $headers = "From: $email\r\nReply-To: $email";

    // Compose the email message
    $email_message = "New form submission:\n\n";
    $email_message .= "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Message:\n$message";

    // Send the email
    if (mail($to, $subject, $email_message, $headers)) {
        echo "Form submitted successfully! We will get back to you soon.";
    } else {
        echo "Oops! Something went wrong and we couldn't submit your form.";
        // You might want to redirect back to the form page or handle the error in a different way.
    }
} else {
    // If someone tries to access this file directly without submitting the form
    echo "Access denied.";
}
?>
