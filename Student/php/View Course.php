<?php
session_start();
include '../../main/DB/DB.php';

$username = $_SESSION['username']; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Courses</title>
    <link rel="stylesheet" type="text/css" href="../css/view courses.css">
</head>
<body>
    <h1>My Registered Courses</h1>
    <div class="container">
        <table>
            <tr>
                <th>user ID</th>
                <th>Course(s)</th>
                <th>Action</th>
            </tr>
            <?php
            
            $sql = "SELECT * FROM course_registration WHERE username='$username'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['username'] . "</td>
                            <td>" . $row['course_name'] . "</td>
                            <td>
                                <a href='Drop.php?id=".$row['id']."' onclick=\"return confirm('Are you sure you want to drop this course?');\">Drop</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No courses registered.</td></tr>";
            }
            ?>
        </table>
    </div>
    <a href="Course Registration.php">Add New Course</a>
</body>
</html>
