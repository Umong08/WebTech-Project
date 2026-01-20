<?php
include '../../main/DB/DB.php';

// Initialize variables
$message = $error = $search = '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $course_name = $_POST['course_name'];
    $grade = $_POST['grade'];
    $year = $_POST['year'];

    if ($action == 'add') {
        $stmt = $conn->prepare("INSERT INTO grades (student_id, student_name, course_name, grade, year, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssssi", $student_id, $student_name, $course_name, $grade, $year);
        $stmt->execute();
        $stmt->close();
        $message = "Grade added successfully!";
    }

    if ($action == 'update') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("UPDATE grades SET student_id=?, student_name=?, course_name=?, grade=?, year=? WHERE id=?");
        $stmt->bind_param("ssssii", $student_id, $student_name, $course_name, $grade, $year, $id);
        $stmt->execute();
        $stmt->close();
        $message = "Grade updated successfully!";
    }

    if ($action == 'delete') {
        $id = $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM grades WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $message = "Grade deleted successfully!";
    }
}

// Fetch grades
$sql = "SELECT * FROM grades WHERE student_id LIKE ? OR student_name LIKE ? OR course_name LIKE ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$search_param = "%$search%";
$stmt->bind_param("sss", $search_param, $search_param, $search_param);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grade Management</title>
  <style>
    .form-container { 
        background: #ffffff; 
        padding: 16px; 
        margin: 16px 0; 
        border-radius: 8px; 
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .form-group { margin: 12px 0; }
    .form-group label { 
        display: inline-block; 
        width: 140px; 
        font-weight: 600; 
        font-size: 14px;
    }
    .form-group input, .form-group select { 
        padding: 10px 12px; 
        width: 220px; 
        border: 1px solid #e0e0e0; 
        border-radius: 6px; 
        font-size: 14px;
        transition: border-color 0.2s;
    }
    .form-group input:focus, .form-group select:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0,123,255,0.2);
    }
    .btn { 
        background: #007bff; 
        color: white; 
        padding: 10px 16px; 
        border: none; 
        border-radius: 6px; 
        cursor: pointer; 
        margin: 4px; 
        font-size: 14px;
        font-weight: 500;
        transition: background 0.2s;
    }
    .btn:hover { background: #0056b3; }
    .btn-danger { background: #dc3545; }
    .btn-danger:hover { background: #c82333; }
    .table { 
        width: 100%; 
        border-collapse: collapse; 
        margin: 20px 0; 
        font-size: 14px;
    }
    .table th, .table td { 
        border: 1px solid #dee2e6; 
        padding: 12px 14px; 
        text-align: left; 
    }
    .table th { 
        background: #f8f9fa; 
        font-weight: 600;
    }
    .message { 
        background: #d1ecf1; 
        color: #0c5460; 
        padding: 12px 16px; 
        border-radius: 6px; 
        margin: 12px 0; 
        border-left: 4px solid #17a2b8;
    }
    .error { 
        background: #f8d7da; 
        color: #721c24; 
        padding: 12px 16px; 
        border-radius: 6px; 
        margin: 12px 0; 
        border-left: 4px solid #dc3545;
    }
    .grade-a { background-color: #d4edda; }
    .grade-b { background-color: #d1ecf1; }
    .grade-c { background-color: #fff3cd; }
    .grade-d { background-color: #f8d7da; }
    .grade-f { background-color: #f5c6cb; }
</style>

</head>
<body>
<center>
    <h2>Student Grade Management</h2>

    <?php if ($message) echo "<div class='message'>$message</div>"; ?>
    <?php if ($error) echo "<div class='error'>$error</div>"; ?>

    <!-- Search Form -->
    <div class="form-container">
        <h3>Search Grades</h3>
        <form method="GET">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Student ID, Name or Course">
            <button type="submit" class="btn">Search</button>
            <a href="Grade.php" class="btn">Clear</a>
        </form>
    </div>

    <!-- Add Grade Form -->
    <div class="form-container">
        <h3>Add New Grade</h3>
        <form method="POST">
            <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label>Student Name:</label>
                <input type="text" name="student_name" required>
            </div>
            <div class="form-group">
                <label>Student ID:</label>
                <input type="text" name="student_id" required>
            </div>
            <div class="form-group">
                <label>Course Name:</label>
                <input type="text" name="course_name" required>
            </div>
            <div class="form-group">
                <label>Grade:</label>
                <select name="grade" required>
                    <option value="">Select Grade</option>
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="C-">C-</option>
                    <option value="D+">D+</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="form-group">
                <label>Year:</label>
                <input type="number" name="year" min="2020" max="2030" value="<?php echo date('Y'); ?>" required>
            </div>
            <button type="submit" class="btn">Add Grade</button>
        </form>
    </div>

    <!-- Grades Table -->
    <div>
        <h3>All Grades</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Course</th>
                    <th>Grade</th>
                    <th>Year</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): 
                        $grade_class = 'grade-f';
                        switch(substr($row['grade'],0,1)){
                            case 'A': $grade_class='grade-a'; break;
                            case 'B': $grade_class='grade-b'; break;
                            case 'C': $grade_class='grade-c'; break;
                            case 'D': $grade_class='grade-d'; break;
                        }
                    ?>
                    <tr class="<?php echo $grade_class; ?>">
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['course_name']); ?></td>
                        <td><?php echo $row['grade']; ?></td>
                        <td><?php echo $row['year']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <button onclick="editGrade(<?php echo $row['id']; ?>,'<?php echo $row['student_name']; ?>','<?php echo $row['student_id']; ?>','<?php echo $row['course_name']; ?>','<?php echo $row['grade']; ?>',<?php echo $row['year']; ?>)" class="btn">Edit</button>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="8">No grades found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" style="display:none;" class="form-container">
        <h3>Edit Grade</h3>
        <form method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" id="edit_id">
            <div class="form-group">
                <label>Student Name:</label>
                <input type="text" name="student_name" id="edit_student_name" required>
            </div>
            <div class="form-group">
                <label>Student ID:</label>
                <input type="text" name="student_id" id="edit_student_id" required>
            </div>
            <div class="form-group">
                <label>Course Name:</label>
                <input type="text" name="course_name" id="edit_course_name" required>
            </div>
            <div class="form-group">
                <label>Grade:</label>
                <select name="grade" id="edit_grade" required>
                    <option value="">Select Grade</option>
                    <option value="A+">A+</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="C-">C-</option>
                    <option value="D+">D+</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>
            </div>
            <div class="form-group">
                <label>Year:</label>
                <input type="number" name="year" id="edit_year" min="2020" max="2030" required>
            </div>
            <button type="submit" class="btn">Update Grade</button>
            <button type="button" class="btn btn-danger" onclick="cancelEdit()">Cancel</button>
        </form>
    </div>
</center>

<script>
function editGrade(id, student_name, student_id, course_name, grade, year){
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_student_name').value = student_name;
    document.getElementById('edit_student_id').value = student_id;
    document.getElementById('edit_course_name').value = course_name;
    document.getElementById('edit_grade').value = grade;
    document.getElementById('edit_year').value = year;
    document.getElementById('editModal').style.display = 'block';
}
function cancelEdit(){
    document.getElementById('editModal').style.display = 'none';
}
</script>
</body>
</html>
