<?php
include '../../main/DB/DB.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_title = $_POST['task_title'];
    $course = $_POST['course'];
    $due_date = $_POST['due_date'];
    $task_description = $_POST['task_description'];
    $file_content = null; // Default to null if no file is uploaded

    // Handle file upload
    if (isset($_FILES['task_file']) && $_FILES['task_file']['error'] == UPLOAD_ERR_OK) {
        $file_content = file_get_contents($_FILES['task_file']['tmp_name']); // Read file content as binary
    }

    $sql = "INSERT INTO tasks (task_title, course, due_date, task_description, file_content) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssb", $task_title, $course, $due_date, $task_description, $file_content);

    // Bind the BLOB parameter separately
    $null = null;
    $stmt->send_long_data(4, $file_content); // Parameter index 4 is file_content

    if ($stmt->execute()) {
        $success_message = "Task uploaded successfully!";
    } else {
        $error_message = "Error uploading task: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>AIUB Clone - Upload Task</title>
    <link rel="stylesheet" href="../CSS/teacher.css">
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 24px;
        }
        /* Move all your existing CSS here - the styles you provided */
        h2 {
            margin-bottom: 30px;
            text-align: center;
        }
        h2 label:first-child {
            color: #0d65ca;
            font-size: 28px;
            font-weight: 700;
            display: block;
        }
        h2 label:last-child {
            color: #363636;
            font-size: 16px;
            letter-spacing: 2px;
            margin-top: 5px;
        }
        #id1 {
            max-width: 800px;
            margin: 0 auto;
        }
        .task-form {
            background: #ffffff;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }
        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 14px 18px;
            border-radius: 8px;
            border-left: 4px solid #28a745;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 14px 18px;
            border-radius: 8px;
            border-left: 4px solid #dc3545;
            margin-bottom: 20px;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
            font-weight: 500;
            font-size: 14px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s;
            box-sizing: border-box;
            font-family: inherit;
        }
        .form-group textarea {
            height: 160px;
            resize: vertical;
            line-height: 1.5;
        }
        .form-group input[type="file"] {
            padding: 12px;
            background: #f8f9fa;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0,123,255,0.1);
        }
        button[type="submit"] {
            background: #007bff;
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
            width: 100%;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <center>
        <h2>
            <label>UPLOAD TASK</label><br>
            <label>************************************************</label>
        </h2>

        <div id="id1">
            <form method="POST" enctype="multipart/form-data" class="task-form">
                <?php if (isset($success_message)): ?>
                    <div class="success-message"><?php echo $success_message; ?></div>
                <?php endif; ?>
                <?php if (isset($error_message)): ?>
                    <div class="error-message"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <div class="form-group">
                    <label>Task Title:</label>
                    <input type="text" name="task_title" required>
                </div>
                <div class="form-group">
                    <label>Course:</label>
                    <input type="text" name="course" required>
                </div>
                <div class="form-group">
                    <label>Due Date:</label>
                    <input type="date" name="due_date" required>
                </div>
                <div class="form-group">
                    <label>Task Description:</label>
                    <textarea name="task_description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Upload File:</label>
                    <input type="file" name="task_file">
                </div>
                <button type="submit">Upload Task</button>
            </form>
        </div>
    </center>
</body>
</html>
