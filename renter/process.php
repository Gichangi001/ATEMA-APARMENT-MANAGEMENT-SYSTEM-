<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Collect form data
    $comment1 = $_POST["comment1"];
    $comment2 = $_POST["comment2"];
    $comment3 = $_POST["comment3"];
    $comment4 = $_POST["comment4"];
    $comment5 = $_POST["comment5"];
    $comment6 = $_POST["comment6"];
    $comment7 = $_POST["comment7"];
    $comment8 = $_POST["comment8"];

    // Build email message
        $subject = "Self Test Response";
    $message = "comment Area 1:\n$comment1\n\n";
    $message = "comment Area 2:\n$comment2\n\n";
    $message = "comment Area 3:\n$comment3\n\n";
    $message = "comment Area 4:\n$comment4\n\n";
    $message = "comment Area 5:\n$comment5\n\n";
    $message = "comment Area 6:\n$comment6\n\n";
    $message = "comment Area 7:\n$comment7\n\n";
    $message = "comment Area 8:\n$comment8\n\n";

    // Set up PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'alexmaina8@gmail.com'; // Your email address
        $mail->Password   = 'okpd ojzk xmkq iueh'; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('alexmaina8@gmail.com', 'Your Name');
        $mail->addAddress('alexandergichangi.com'); // Replace with your recipient's email address

        // Content
        $mail->isHTML(false); // Set to true if your message contains HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send email
        $mail->send();
        echo "Thank you for your feedback! Your response has been submitted.";
    } catch (Exception $e) {
        echo "Oops! Something went wrong and we couldn't submit your response. Error: {$mail->ErrorInfo}";
    }
} else {
    // Redirect to the form if accessed directly
    header("Location: index.html");
    exit();
}
?>