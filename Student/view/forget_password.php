<?php

$mysqli = require __DIR__ . "/../view/db.php";


require_once __DIR__ . '/../view/mail_function.php';

//  POST data and database update logic here
$email = $_POST["email"];
$token = bin2hex(random_bytes(16));
$token_hash = hash("sha256", $token);
$expiry = date("Y-m-d H:i:s", time() + 60 * 30);

$sql = "UPDATE registration
        SET reset_token_hash = ?,
            reset_token_expires_at = ?
        WHERE email = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("sss", $token_hash, $expiry, $email);
$stmt->execute();

if ($mysqli->affected_rows > 0) {
    $resetLink = "http://localhost/reset-password.php?token=" . urlencode($token); // reset page URL

    $emailSubject = "Password Reset for Your Account";
    $emailBodyHtml = <<<END
    <h1>Password Reset Request</h1>
    <p>You have requested a password reset for your account on Your Website Name.</p>
    <p>Please click the following link to reset your password:</p>
    <p><a href="$resetLink">Click here to reset your password</a></p>
    <p>This link will expire in 30 minutes.</p>
    <p>If you did not request this, please ignore this email.</p>
    <p>Thank you,<br>Your Website Name Team</p>
    END;
    $emailBodyAltText = "Click this link to reset your password: $resetLink (This link expires in 30 minutes. If you did not request this, please ignore.)";


  
    if (sendEmail($email, '', $emailSubject, $emailBodyHtml, $emailBodyAltText)) {
        echo "If an account with that email address is found, a password reset link has been sent to your inbox.";
    } else {
  
        echo "We encountered an issue sending the email. Please try again later.";
    }

} else {
    echo "If an account with that email address is found, a password reset link has been sent to your inbox.";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Forget Password</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #11aade;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 30px;
            }
            .form-container {
                background: #fff;
                padding: 30px 40px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                width: 400px;
                text-align: center;
            }
            h2 {
                margin-bottom: 20px;
                color: #333;
            }
            input[type="email"] {
                width: 100%;
                padding: 10px;
                border: 1px solid #ddd;
                border-radius: 6px;
                background-color: #fff8f3;
                font-size: 14px;
            }
            button {
                background-color: #007bff;
                color: white;
                padding: 10px 15px;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                font-size: 16px;
                margin-top: 15px;
            }
            button:hover {
                background-color: #0056b3;
            }
            p {
                margin-top: 15px;
            }
            a {
                color: #007bff;
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="form-container">
            <img src="../img/project.png" alt="Forget Password" width="200" height="200"><br><br>
            <h2>Forget Password Page</h2>
            <form action="" method="post">
                <label>Enter your registered email:</label><br>
                <input type="email" id="email" name="email" required><br>
                <button type="submit">Submit</button>
            </form>
            <p>Remembered your password? <a href="login.php">Login here</a></p>
            <p>New user? <a href="registration.php">Register here</a></p>
        </div>
    </body>
</html>
