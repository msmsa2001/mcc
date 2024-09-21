<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $course = htmlspecialchars($_POST['course']);
    $mobile_number = htmlspecialchars($_POST['mobile_number']);
    $message = htmlspecialchars($_POST['message']);

    // Your email address where the form data will be sent
    $to = "info@mumbaicodingclub.com";  // Replace with your actual webmail address
    $subject = "New Contact Form Submission";

    // Email body content in HTML format
    $body = "
    <html>
    <head>
      <title>New Contact Form Submission</title>
    </head>
    <body>
      <h2>New Contact Form Submission</h2>
      <p><strong>Name:</strong> $name</p>
      <p><strong>Email:</strong> $email</p>
      <p><strong>Course Selected:</strong> $course</p>
      <p><strong>Mobile Number:</strong> $mobile_number</p>
      <p><strong>Message:</strong><br>$message</p>
    </body>
    </html>
    ";

    // Headers for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= "From: $email" . "\r\n" .
                "Reply-To: $email" . "\r\n" .
                "X-Mailer: PHP/" . phpversion();

    // Send email and return success or error
    if (mail($to, $subject, $body, $headers)) {
        echo "Your message has been sent.";
    } else {
        echo "Error sending email.";
    }
} else {
    echo "Invalid request.";
}
?>
