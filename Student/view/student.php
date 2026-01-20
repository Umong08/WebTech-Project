<?php
session_start();

if(!isset($_SESSION['username']))
{
   header('Location:/project_university_management_system/main/login.php');
    exit(); 
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Home</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #11aade;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: left;
            padding: 30px;
        }
        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
        }
        h1 {
            text-align: left;
            margin-bottom: 20px;
            color: #333;
        }
        .nav-bar {
            background: #990808;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 200px;
            text-align:left;
        }
        .nav-bar a {
            display: block;
            margin: 10px 0;
        }
        a button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        a button:hover {
            background-color: #0056b3;
        }
        button {
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
            align-self: flex-end;
        }
        button:hover {
            background-color: #c82333;
        }

        img {
            margin-bottom: 20px;
        }
        .content {
            margin-top: 20px;
            width: 100%;
            height: 600px;
        }
        iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }


    </style>
</head>
    <body>

    <form action="../../main/logout.php" method="post">
            <button type="submit">Logout</button>
        </form>

        <center>
            <img src="../../main/image/project.png" alt="Home" width="200" height="200">
                      <h1>Welcome student.....</h1>
        </center>
    <div class ="container">
    <div class="nav-bar">
        <a href="View Courses.php" target="abc"><button>View Courses</button></a>
    <a href="Check Grade.php" target="abc"><button>Check Grade</button></a>
    <a href="Submit Assignment.php" target="abc"><button>Submit Assignment</button></a>
    <a href="Borrow_Library_Book.php" target="abc"><button>Borrow Library Book</button></a>
    <a href="payment.php" target="abc"><button>payment</button></a>
    <a href="Course Registration.php" target="abc"><button>Course Registration</button></a>
    </div>

    <div class="content">
        <iframe name="abc"> </iframe>
    </div>

    </div>

    
        

    </body>
</html>



