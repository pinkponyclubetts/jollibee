<?php
error_reporting(0);
include('include/db_conn.php');

// 1. Gets the Student Details
if (isset($_GET['a'])) {
    $id = $_GET['a'];
    $get_student = mysqli_query($conn, "SELECT * FROM students WHERE student_id = '$id'");
    $row = mysqli_fetch_assoc($get_student);
}

// 2. Processes the updated information once the user submits
if (isset($_POST['btn_update'])) {
    $student_id = $_POST['student_id'];
    $student_firstname = $_POST['student_firstname'];
    $student_middlename = $_POST['student_middlename'];
    $student_lastname = $_POST['student_lastname'];
    $student_email = $_POST['student_email'];
    $student_contactno = $_POST['student_contactno'];

    $update_sql = "UPDATE students SET 
                    student_firstname = '$student_firstname', 
                    student_middlename = '$student_middlename', 
                    student_lastname = '$student_lastname',
                    student_email = '$student_email',
                    student_contactno = '$student_contactno'
                    WHERE student_id = '$student_id'";

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Student applicant details updated successfully!'); window.location='enrollment.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>

<html>
<head>
    <title>Update Employee</title>
    <style>
        body {
                font-family: Helvetica;
                background-image: url('images/dlsu-background.png');
                background-size: cover;
                background-attachment: fixed;
                background-repeat: no-repeat;
        }
        input, button {
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }
        input[type="text"], input[type="number"] {
            width: 14rem;
        }
        #box1, #box2, #box3 {
            background-color: white;
            width: 30%;
            padding: 1rem;
            border-radius: 1rem;    
            box-shadow: 0rem 0.5rem 1rem 0.1rem gray;   
            margin-block: 0.5rem;         
        }
        #box2 {
            background-color: darkgreen;
            padding: 0.5rem;
            height: 0.1rem;
        }
        button[type="submit"], #reset {
            margin-inline: 0.5rem; 
            padding: 0.5rem;
            border-radius: 1rem;
        }
        button[type="submit"] {
            width: 7rem;
            background-color: lightgreen;
            border-color: darkgreen;
        }
        #reset {
            width: 5rem;
            background-color: salmon;
            border-color: darkred;
        }
        button:hover {
            cursor: pointer;
        }
        #no-style {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<center>
<body>
    <div id="box1">
        <img src="images/dlsu-logo.png" width="350" height="100">
    </div>
    <div id="box2">
    </div>
    <div id="box3">
    <h1>Update Student Applicant Details</h1>
    <?php if ($row): ?>
    <form method="POST" action="update.php">
        <input type="hidden" name="student_id" value="<?=$row['student_id'];?>">
            
            <label>Student First Name:</label><br>
            <input type="text" name="student_firstname" value="<?=$row['student_firstname'];?>" required><br>
            
            <label>Student Middle Name:</label><br>
            <input type="text" name="student_middlename" value="<?=$row['student_middlename'];?>" required><br>

            <label>Student Last Name:</label><br>
            <input type="text" name="student_lastname" value="<?=$row['student_lastname'];?>" required><br>

            <label>Student Email:</label><br>
            <input type="text" name="student_email" value="<?=$row['student_email'];?>" required><br>

            <label>Contact Number:</label><br>
            <input type="number" name="student_contactno" value="<?=$row['student_contactno'];?>" required><br>

        <button type="submit" name="btn_update">Save Changes</button>
        <button id="reset"><a href="enrollment.php" id="no-style">Return</a></button>
    </form>
    </div>
    <?php else: ?>
        <p>Student not found.</p>
        <a href="enrollment.php">Return</a>
    <?php endif; ?>
</body>
</center>
</html>