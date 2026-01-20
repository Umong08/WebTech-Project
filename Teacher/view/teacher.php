<?php
session_start();


if(!isset($_SESSION['username']))
{
    header('Location:/project_university_management_system-main/project_university_management_system-main/main/login.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>AIUB Clone</title>
    <link rel="stylesheet" href="../CSS/teacher.css">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        header {
            background: #ffffff;
            padding: 20px 40px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 20px;
            position: relative;
        }
        header img {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            object-fit: cover;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        header label {
            color: #212529;
            font-size: 24px;
            font-weight: 700;
            margin: 0;
            flex: 1;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropbtn {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
            border: none;
        }
        .dropbtn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(0,0,0,0.2);
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background: #ffffff;
            min-width: 220px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.15);
            border-radius: 12px;
            z-index: 1000;
            top: 100%;
            margin-top: 8px;
            overflow: hidden;
        }
        .dropdown:hover .dropdown-content {
            display: block;
            animation: slideDown 0.2s ease-out;
        }
        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .dropdown-content a {
            color: #495057;
            padding: 14px 20px;
            text-decoration: none;
            display: block;
            font-size: 14px;
            font-weight: 500;
            border-bottom: 1px solid #f1f3f4;
            transition: all 0.2s;
        }
        .dropdown-content a:hover {
            background: #f8f9fa;
            color: #007bff;
            padding-left: 24px;
        }
        .dropdown-content a:last-child {
            border-bottom: none;
        }
        .dropdown-content button {
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            color: #495057;
            padding: 14px 20px;
        }
        .dropdown-content button:hover {
            background: #f8f9fa;
            color: #007bff;
            padding-left: 24px;
        }
        #logout {
            background: #dc3545 !important;
            color: white !important;
            font-weight: 600;
        }
        #logout:hover {
            background: #c82333 !important;
            color: white !important;
            padding-left: 24px;
        }
        #id2 {
            margin-top: 40px;
            display: flex;
            justify-content: center;
        }
        #idframe {
            width: 100%;
            max-width: 1400px;
            height: 700px;
            border: none;
            border-radius: 16px;
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        }
        center {
            padding: 20px 0;
        }
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
                gap: 16px;
                padding: 20px;
            }
            header label {
                font-size: 20px;
            }
            .dropdown {
                float: none !important;
                margin: 10px;
            }
            #idframe {
                height: 500px;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="../../main/image/IMG-20250823-WA0011.jpg" alt="AIUB">
        <label>UNIVERSITY MANAGEMENT Teacher section </label>
    </header>

    <center>
        <div class="dropdown" style="float:left;">
            <img src="../../main/image/menu icon.jpg" alt="menu" class="dropbtn">
            <div class="dropdown-content" style="left:0;">
                
                <a href="#" onclick="loadpage('../php/Upload Task.php')"><button>Upload task</button></a>
                <a href="#" onclick="loadpage('../php/Grade.php')"><button>Student Grade</button></a>
                <a href="#" onclick="loadpage('../php/Send Annoucement.php')"><button>Send Announcement</button></a>
            </div>
        </div>

        <div class="dropdown" style="float:right;">
            <img src="../../main/image/setting.png" alt="setting" class="dropbtn">
            <div class="dropdown-content" style="right:0;">
                <button type="button" id="logout" onclick="document.location.href='../../main/logout.php'">Logout</button>
            </div>
        </div>

        <div id="id2">
            <iframe id="idframe"></iframe>
        </div>
    </center>

    <script src="../js/aiub.js"></script>
</body>
</html>
