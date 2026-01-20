<?php
session_start();
include 'DB/DB.php';

$success=$error="";
$fullnameerr=$usernameerr=$emailerr=$roleerr=$passworderr=$cpassworderr=$departmenterr="";
$fullname=$username=$role=$email=$password=$cpassword=$department="";
    
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $fullname=$_POST['fullname'];
    $role=$_POST['role'];
    $department=$_POST['department'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    session_unset();
    ///////full name
    if(empty($fullname))
    { $fullnameerr="fullname is required";}
    else
    { $fullname=test_input($_POST["fullname"]);
        if(!preg_match("/^[a-zA-Z-' ]*$/",$fullname))
        {$fullnameerr="only text character should be enter";}   
    }

    /////role
    if(empty($role) || $role=="select")
    { 
        $roleerr="role is required";
    } 

    
    else
    {
        $role=test_input($_POST["role"]);
        
    }

    ///derapmetn

    if(empty($department))
    {  
        $departmenterr="plase select the department";
    }
    else
    {
        $department=test_input($_POST['department']);
    }

    //////username
    if(empty($username))
    {
        $usernameerr="username is required";
    }
    else
    {
        if($role=="Teacher")
        {
            if(!preg_match("/^[0-9]{4}-[0-9]{4}$/",$username))
            { $usernameerr="teacher id must be in the format XXXX-XXXX";}
        }
        elseif($role=="Student")
        {
            if(!preg_match("/^[1-9]{2}-[0-9]{5}-[1-3]{1}$/",$username))
            { $usernameerr="student id must be in the format XX[1-9]-XXXXX[1-9]-X[1-3]";}
        }
        
    }
    /////email
    if(empty($email))
    { $emailerr="email is required";}
    else
    {
        $email=test_input($_POST["email"]);
    }
   
    ////password
    if(empty($password))
    { $passworderr="password is required";}
    else
    {
        $password=test_input($_POST["password"]);
        if(strlen($password)<8 || strlen($password)>8)
        {$passworderr="password must contain at least 8 charater long";}

    }

    ////conftim password
    if(empty($cpassword))
    {
        $cpassworderr="please enter your confirm password";
    }
    else 
    {
         $cpassword=test_input($_POST["cpassword"]);
         if($cpassword!=$password)
         {$cpassworderr="password must be same";}
    }

    if(isset($_POST['reset']))
    {
        $fullname=$role=$username=$email=$password=$cpassword="";
        $fullnameerr=$roleerr=$usernameerr=$emailerr=$passworderr=$cpassworderr="";
        $success=$error="";
    }

   else
   {  
    $check_sql="SELECT * FROM registration WHERE username='$username' LIMIT 1";/////////one can notregister more than one
    $check_result=$conn-> query($check_sql);
    if($check_result-> num_rows > 0)
    {
        $error="username alreday registered";
    }
    else
    {
    
     $hash_pass=password_hash($password,PASSWORD_DEFAULT);
     $sql1="INSERT INTO registration(fullname,role,department,username,email,password) VALUES('$fullname','$role','$department','$username','$email','$hash_pass')";
     $sql2="INSERT INTO login(username,password) VALUES('$username','$hash_pass')";
        if($conn->query($sql1)===TRUE && $conn->query($sql2)===TRUE)
            {
            $success="New record created successfully";
          
            $fullname=$role=$username=$email=$password=$cpassword="";
            }
        else
            {
            $error="Error: ".$sql."<br>".$conn->error;

            }
        }
      

    }
   
}
 

function test_input($data)
{
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
}

session_destroy();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet"  href="final_registration.css">
        
</head>
<body>
    <center>
    <p style="color:green;font-size:20px;" class ="success"><?php echo $success; ?></p>
    <p  style="color:red; font-size:20px;"class="error"><?php echo $error; ?></p>
    <div class="container">
    <form action="final_registration.php" method="post">
    <h1>Registration Form</h1>
    <label>Full Name:</label>
    <input type="text" id="fullname" name="fullname" value="<?php echo $fullname; ?>">
     <span style="color:#f74a05;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $fullnameerr; ?></span><br><br>

    <label>Select role:</label>
    <select id="role" name="role" >
        <option value="select">--select--</option>
        <option value="Teacher" ><?php if($role=="Teacher") ?>Teacher</option>
        <option value="Student"><?php if($role=="Student") ?>Student</option>
    </select>
    <span style="color:#f74a05;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $roleerr; ?></span><br><br>
    
    <select id="department" name="department" >
        <option value="select">--select--</option>
        <option value="FST" >FST</option>
        <option value="FEE">FEE</option>
        <option value="FBA">FBA</option>
    </select>
    <span style="color:#f74a05; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $departmenterr; ?></span>
    
    <label>UserName:</label>
    <input type="text" id="username" name="username" value="<?php echo $username; ?>">
    <span style="color:#f74a05;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $usernameerr; ?></span><br><br>
    <label>Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $email; ?>">
    <span style="color:#f74a05;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $emailerr; ?></span><br><br>

    <label>Password:</label>
    <input type="password" id="password" name="password" value="<?php echo $password; ?>">
    <span style="color:#f74a05;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $passworderr; ?></span><br><br>

    <label>Confirm Password:</label>
    <input type="password" id="cpassword" name="cpassword" value="<?php echo $cpassword; ?>">
    <span style="color:#f74a05;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"><?php echo $cpassworderr; ?></span><br><br>

    <button type="submit" name="submit">Register</button>
    <button type="submit" name="reset" value="reset">Reset</button>
    <p>Already have an account? <a href="login.php">Login here</a></p>
    <a href="view/maindeshboard.html">Home Page</a>
    
    </form>
</center>
</div>
</body>    
</html>





