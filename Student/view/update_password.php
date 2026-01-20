<?php
include '../../main/DB/DB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $sql = "UPDATE registration SET password='$new_password' WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {

        mysqli_query($conn, "DELETE FROM reset_codes WHERE email='$email'");
        echo "Password reset successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>






<!DOCTYPE html>
<html>
    <head>
        <title>Update Password</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #11aade;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 30px;
            }
            h2 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
            }
            form {
                background: #fff;
                padding: 30px 40px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                width: 400px;
            }
            label {
                font-weight: bold;
                display: block;
                margin: 12px 0 6px;
            }
            input[type="password"] {
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
            }
            button:hover {
                background-color: #0056b3;
            }
            img {
                margin-bottom: 20px;
            }
        </style>

    </head>
    <body>
        <img src="../img/project.png" alt="Forget Password" width="200" height="200"><br><br>
        <h2>Update your password</h2>
        <form>
            <label>New Password:</label><br>
            <input type="password" id="new-password" name="new-password"><br><br>
            <label>Confirm Password:</label><br>
            <input type="password" id="confirm-password" name="confirm-password"><br><br>
            <button type="submit">Update Password</button>
            

    </body>

</html>