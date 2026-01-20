<?php

include '../../main/DB/DB.php';
session_start();

$web_sql="SELECT section,subject,time FROM web_tech";
$data_sql="SELECT section,subject,time FROM data_science";
$network_sql="SELECT section,subject,time FROM computer_network";

if($_SERVER["REQUEST_METHOD"]=="POST" )
{
    if (isset($_POST['course']) && is_array($_POST['course']) && count($_POST['course']) > 0) {

        $selected_courses = $_POST['course'];
        $username = $_SESSION['username'];

        // Already registered courses check
        $check_sql = "SELECT course_name FROM course_registration WHERE username = '$username'";
        $check_result = $conn->query($check_sql);

        $already_courses = [];
        if ($check_result->num_rows > 0) {
            $row = $check_result->fetch_assoc();
            $already_courses = explode(", ", $row['course_name']);
        }

        // Merge previous and new courses
        $final_courses = array_unique(array_merge($already_courses, $selected_courses));

        // Limit: only 2 courses (6 credits)
        if (count($final_courses) > 2) {
            $error = "You are allow only 6 credit (max 2 courses).";
        } else {
            $time_slots = [];
            $conflict_found = false;

            foreach ($final_courses as $course) {
                $parts = explode(" - ", $course);
                $section = end($parts);

                $time_sql = "
                    SELECT time FROM web_tech WHERE section='$section'
                    UNION
                    SELECT time FROM data_science WHERE section='$section'
                    UNION
                    SELECT time FROM computer_network WHERE section='$section'
                ";
                $time_result = $conn->query($time_sql);

                if ($time_result->num_rows > 0) {
                    $row = $time_result->fetch_assoc();
                    $time_slot = $row['time'];

                    if (in_array($time_slot, $time_slots)) {
                        $conflict_found = true;
                        break;
                    }
                    $time_slots[] = $time_slot;
                }
            }

            if ($conflict_found) {
                $error = "Time clash found! Please choose different courses.";
            } else {
                $course_names = [];
                $section_conflict = false;

                foreach ($final_courses as $course) {
                    $parts = explode(" - ", $course);
                    $course_name_only = $parts[0]; 

                    if (in_array($course_name_only, $course_names)) {
                        $section_conflict = true;
                        break;
                    }
                    $course_names[] = $course_name_only;
                }

                if ($section_conflict) {
                    $error = "You cannot register multiple sections of the same course.";
                } else {
                    // Final courses string
                    $courses_str = implode(", ", $final_courses);

                    // === Fee Calculation ===
                    $total_courses = count($final_courses);
                    if ($total_courses == 1) {
                        $fees = 5000;
                    } elseif ($total_courses == 2) {
                        $fees = 10000;
                    } else {
                        $fees = 0; 
                    }

                    // Insert or Update
                    if ($check_result->num_rows > 0) {
                        $update_sql = "UPDATE course_registration 
                                       SET course_name = '$courses_str',
                                           total_fee = '$fees'
                                       WHERE username = '$username'";
                        if ($conn->query($update_sql) === TRUE) {
                            $success = "Courses updated successfully. Total Fees: " . $fees . " Taka.";
                        } else {
                            $error = "Error: " . $conn->error;
                        }
                    } else {
                        $insert_sql = "INSERT INTO course_registration (username, course_name, total_fee) 
                                       VALUES ('$username', '$courses_str', '$fees')";
                        $conn->query($insert_sql);


                        foreach($selected_courses as $course_item){

                            $check_course_sql = "SELECT * FROM user_courses WHERE username='$username' AND course_name='$course_item'";
                            $check_course_result = $conn->query($check_course_sql);

                            if ($check_course_result->num_rows == 0) {
                                $insert_course_sql = "INSERT INTO user_courses (username, course_name) 
                                                      VALUES ('$username', '$course_item')";
                                $conn->query($insert_course_sql);
                            }
                            $check_course_result->free();
                        

                        }
                            
                            

                            $success = "Courses registered successfully. Total Fees: " . $fees . " Taka.";
                    
                        }
                    }
                }
            }
        }
    else {
        $error = "No courses selected.";
    }


}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Course Registration</title>
        <link rel="stylesheet" type="text/css" href="../css/Course Registration.css">
    </head>
<body>
    <div class="container">
    <form action="Course Registration.php" method="post">
    <table>
        <h1>Course Registration</h1>
        <tr>
            <th>[Select]</th>
            <th>[Section]</th>
            <th>[Subject]</th>
            <th>[Time]</th>
        </tr>

        <tr>
            <th colspan="4" style="background-color:#f0f0f0;">Web Technology</th>
        </tr>
        <?php

            $result1 = $conn->query($web_sql);
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    echo "<tr>
                            <td><input type='checkbox' name='course[]' value='Web Technology - " . $row['section'] . "'></td>
                            <td>" . $row['section'] . "</td>
                            <td>" . $row['subject'] . "</td>
                            <td>" . $row['time'] . "</td>
                          </tr>";
                }
            }

        ?>
        <tr>
            <th colspan="4" style="background-color:#f0f0f0;">Data Science</th>
        </tr>
        <?php

            $result2 = $conn->query($data_sql);
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    echo "<tr>
                            <td><input type='checkbox' name='course[]' value='Data Science - " . $row['section'] . "'></td>
                            <td>" . $row['section'] . "</td>
                            <td>" . $row['subject'] . "</td>
                            <td>" . $row['time'] . "</td>
                          </tr>";
                }
            }
            ?>
        <tr>
            <th colspan="4" style="background-color:#f0f0f0;">Computer Network</th>
        </tr>
        <?php

            $result3 = $conn->query($network_sql);
            if ($result3->num_rows > 0) {
                while ($row = $result3->fetch_assoc()) {
                    echo "<tr>
                            <td><input type='checkbox' name='course[]' value='Computer Network - " . $row['section'] . "'></td>
                            <td>" . $row['section'] . "</td>
                            <td>" . $row['subject'] . "</td>
                            <td>" . $row['time'] . "</td>
                          </tr>";
                }
            }

            $conn->close();
        ?>

    </table>
        <button type="submit" name="register_course">Register</button>



        </form>
        


        <?php
        
 if (isset($success)) {
            echo "<p class='success'>$success</p>";
        }
        if (isset($error)) {
            echo "<p class='error'>$error</p>";
        }
        ?>
        <a href ="View Courses.php">view register course</a>



    </div>
    
</html>
