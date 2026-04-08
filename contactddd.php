<?php

// include 'db.php';

// if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") {
//     $firstname = filter_input(INPUT_POST, 'firstname' , FILTER_SANITIZE_SPECIAL_CHARS);
//     $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
//     $pnumber = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT);
//     $company_name = filter_input(INPUT_POST, 'company-name', FILTER_SANITIZE_SPECIAL_CHARS);
//     $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

//     $sql = "INSERT INTO users (firstname, email, phonenumber, companyname, longmessage) VALUES ('$firstname', '$email', '$pnumber', '$company_name', '$message')";
    
//     mysqli_query($conn, $sql);
// }
// ?>


<?php
include 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './PHPMailer/src/Exception.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $pnumber = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_NUMBER_INT);
    $company_name = filter_input(INPUT_POST, 'company_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!$email) {
        die("Invalid email address");
    }

    //  Prepared statement
    $stmt = $conn->prepare(
        "INSERT INTO users (firstname, email, phonenumber, companyname, longmessage)
         VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->bind_param("sssss", $firstname, $email, $pnumber, $company_name, $message);

    if ($stmt->execute()) {

        //  Send email ONLY after successful insert
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'abellangwu0@gmail.com';
            $mail->Password   = 'erpypbzylncwvlwy';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('abellangwu0@gmail.com', 'Website Contact');
            $mail->addAddress('abellangwu0@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission';
            $mail->Body = "
                <h3>New Message</h3>
                <p><strong>Name:</strong> $firstname</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $pnumber</p>
                <p><strong>Company:</strong> $company_name</p>
                <p><strong>Message:</strong><br>$message</p>
            ";

            $mail->send();
            echo "Form submitted and email sent successfully";

        } catch (Exception $e) {
            echo "Saved, but email failed: {$mail->ErrorInfo}";
        }

    } else {
        echo "Database error";
    }
}
?>

<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require './PHPMailer/src/Exception.php';
// require './PHPMailer/src/PHPMailer.php';
// require './PHPMailer/src/SMTP.php';

// if (isset($_POST['submit'])) {
//     $fullname = filter_input(INPUT_POST, 'fn', FILTER_SANITIZE_SPECIAL_CHARS);
//     $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
//     $usermessage = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

//     $message = $usermessage;
//     $subject = 'Contact Form Message';

//     try {
//         $mail = new PHPMailer(true);

//         $mail->isSMTP();
//         $mail->Host = "smtp.gmail.com";
//         $mail->SMTPAuth = true;
//         $mail->Username = 'ezekamsi35@gmail.com';
//         $mail->Password = 'your-app-password-here'; // Use Gmail App Password
//         $mail->SMTPSecure = 'ssl';
//         $mail->Port = 465;

//         // Corrected sender & recipient
//         $mail->setFrom($email, $fullname); // user’s email & name
//         $mail->addAddress("ezekamsi35@gmail.com"); // YOUR inbox

//         $mail->isHTML(true);
//         $mail->Subject = $subject;
//         $mail->Body = nl2br($message); // preserves line breaks

//         $mail->send();

//         echo "<script>alert('Message successfully sent');</script>";
//     } catch (Exception $e) {
//         echo "<script>alert('Message could not be sent: {$mail->ErrorInfo}');</script>";
//     }
// }
?>
