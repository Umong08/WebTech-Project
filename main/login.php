<?php
session_start();
include 'DB/DB.php';
$error="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql="SELECT * FROM login WHERE username='$username' LIMIT 1";
    $result=$conn->query($sql);

    if($result->num_rows >0)
    {
        $row=$result->fetch_assoc();

        if(password_verify($password,$row['password']))///password_verify check kore hashed paassword ke
        {
            $_SESSION['username']=$row['username'];
            if(preg_match("/^[0-9]{4}-[0-9]{4}$/",$username))
            {  
                header('Location:/project_university_management_system/Teacher/View/teacher.php');//link ke redirect kore day///SHEUN tomar main dashboard er link dibe ei khane
                exit();
            }
            elseif(preg_match("/^[1-9]{2}-[0-9]{5}-[1-3]{1}$/",$username))
            {
               
                header('Location:/project_university_management_system/student/view/student.php');///MARUF tomar main  dashboard er link dibe eikhane
                exit();
            
            }
            else
            {$error="pattern not amthced with the username";}

        }

        else
            { $error="password is wrong";}
    }
    else
    { $error="username is worng";}

    if($username==="admin" && $password==="admin")///////only for admin
    {
        $_SESSION['username']=$username;
        header('Location:/project_university_management_system/admin/view/admin.php');
        exit();
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <style>
            body {
                background-image: url(image/login.png);
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .login-container {
                background: #fff;
                padding: 30px 40px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                width: 300px;
                text-align: center;
            }
            h2 {
                margin-bottom: 20px;
                color: #333;
            }
            input[type="text"], input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ddd;
                border-radius: 6px;
                background-color: #fff8f3;
                font-size: 14px;
            }
            button {
                width: 100%;
                padding: 10px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 6px;
                cursor: pointer;
                font-size: 16px;
            }
            button:hover {
                background-color: #0056b3;
            }
            form {
                margin-top: 20px;
            }
            a {
                display: block;
                margin-top: 15px;
                color: #007bff;
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
            img {
                margin-bottom: 20px;
            }
            

            </style>


    </head>
    <body>
        
        <div class="login-container">
            
           <p style="color:red;font-size:20px;"><?php echo $error; ?></p>
            <img src="image/project.png" alt="Login" width="200" height="200"><br><br>
            <h2>Login</h2>
            <form action="" method="post">
                <input type="text" name="username" placeholder="Username"><br>
                
                <br>
                <input type="password" name="password" placeholder="Password"><br>
            
                <br>
                <button type="submit">Login</button>

            </form>
            <a href="final_registration.php">Don't have an account? Sign up</a>
            <a href="forget_password.html">Forgot Password?</a>
            <a href="maindeshboard.html">Home Page</a>
         
        </div>
        

        


    </body>
</html>