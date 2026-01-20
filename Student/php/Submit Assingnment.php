<?php
include '../../main/DB/DB.php';
$success=$error="";
if($_SERVER["REQUEST_METHOD"]=="POST" )
{
    $student_name=$_POST['student_name'];
    $student_id=$_POST['student_id'];
    $course=$_POST['course'];

    if (isset($_FILES['assignment_file']) && $_FILES['assignment_file']['error'] == 0) {
        $file_name   = $_FILES['assignment_file']['name'];
        $tmp_name    = $_FILES['assignment_file']['tmp_name'];
        $target_dir  = "uploads/";
        $target_file = $target_dir . basename($file_name);

        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        if (empty($student_name) || empty($student_id) || empty($course)) {
            $error = "All fields are required.";
        } else {
           
            $check_sql = "SELECT * FROM assignment WHERE student_id='$student_id' AND course='$course'";
            $result = $conn->query($check_sql);

            if ($result->num_rows > 0) {
                $error = "You have already submitted assignment for this course!";
            } else {
                if (move_uploaded_file($tmp_name, $target_file)) {
                    $sql = "INSERT INTO assignment (student_name, student_id, course, file) 
                            VALUES ('$student_name', '$student_id', '$course', '$file_name')";
                    if ($conn->query($sql) === TRUE) {
                        $success = "Assignment submitted successfully!";
                    } else {
                        $error = "Database Error: " . $conn->error;
                    }
                } else {
                    $error = "File upload failed.";
                }
            }
        }
    } else {
        $error = "Please fill all fields and select a file.";
    }




}
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Submit Assignment</title>
        <link rel="stylesheet" type="text/css" href="../css/Submit Assignment.css">
</head>
<body>
    <div class="container" enctype="multipart/form-data">
    <h1>Submit Assignment</h1>
    <form action ="" method="post">
        <label>student Name:</label>
        <input type="text" name="student_name">
        <label >Student ID:</label>
        <input type="text" id="student_id" name="student_id" >

        <label>Course:</label>
        <input type="text" id="course" name="course"><br><br>

        <label >Select Assignment File:</label>
        <input type="file" id="assignment_file" name="assignment_file" accept=".pdf,.doc,.docx,.txt">

        <button type="submit" name="submit_assignment">Submit Assignment</button>
    </form>
    <?php
        if (isset($success)) {
            echo "<p class='success'>$success</p>";
        }
        if (isset($error)) {
            echo "<p class='error'>$error</p>";
        }
    ?>
    </div>
</body>

</html>
