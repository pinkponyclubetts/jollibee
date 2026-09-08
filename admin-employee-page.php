<html>
  <head>
    <title>Jollibee - Admin Menu Panel</title>
    <link rel="icon" type="image/png" href="images/jollibee-icon.png">
    <link rel="stylesheet" href="style/admin-employee-page.css">
    <?php
      include("include/db_conn.php");

      // Declaration of Variables
      $employee_name = $_POST["emp_name"] ?? null;
      $employee_email = $_POST["emp_email"] ?? null;
      $employee_status = $_POST["emp_status"] ?? null;
      $sub = $_POST["sub"] ?? null;
      $error = null;

      // Once the user submits the form
      if(isset($sub)) {
        if (empty($employee_name) || empty($employee_email) || empty($employee_status)) {
          $error = "Employee name, email and status required.";
        }
        else {
          $create_sql = "INSERT INTO employee (employee_name, employee_email, employee_status) VALUES ('$employee_name', '$employee_email', '$employee_status');";
          $qry = mysqli_query($conn, $create_sql);
        }
      }
    ?>
  </head>
  <body>
    <div id="box1">
      <a href="admin-panel-page.php">
        <img src="images/jollibee-logo.png" id="logo">
      </a>
      <h5 id="user">Admin</h5>
      <a href="login-page.php">
        <h3 id="logout">Log out</h3>
      </a>
    </div>
    <div id="box2">
      <h1>Employee Registration</h1>
      <form action="" method="POST">
        <label>Employee Name</label><br>
        <input type="text" name="emp_name" placeholder="Please enter employee name..."><br>
        <label>Employee Email</label><br>
        <input type="text" name="emp_email" placeholder="Please enter employee email..."><br>
        <label>Employee Status</label><br>
        <input type="text" name="emp_status" placeholder="Please enter employee status..."><br>
        <input type="submit" value="Register" name="sub"><br>
        <?php if(isset($sub)) {echo "<div id='error'>$error</div>";}?>
      </form>
    </div>
    <div id="box3">
      <h1>Employees</h1>
      <center>
      <table border="1">
        <tr>
          <th>Employee ID</th>
          <th>Employee Name</th>
          <th>Employee Email</th>
          <th>Employee Status</th>
          <th>Update</th>
          <th>Remove</th>
        </tr>
        <?php
            include('include/db_conn.php');
            // Update
              $a = $_REQUEST['a'] ?? null;
              // Delete
              $b = $_REQUEST['b'] ?? null;

              if($b){
                  $delete_sql = "DELETE FROM employee WHERE employee_id = '".$b."'";
                  $delete_qry = mysqli_query($conn, $delete_sql);
              }

            // Shows the table data from SQL and inputs it into the website
            $sql = "SELECT * FROM employee";
            $qry = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($qry)) {
          ?>
          <tr>
            <td><?=$row['employee_id']?></td>
            <td><?=$row['employee_name']?></td>
            <td><?=$row['employee_email']?></td>
            <td><?=$row['employee_status']?></td>
            <td><a href="employee-update-page.php?a=<?=$row['employee_id']?>"><button type="button" id="edit">Update</button></a></td>
            <td><a href="admin-employee-page.php?b=<?=$row['employee_id']?>"><button type="button" id="edit">Remove</button></a></td>
          </tr>
          <?php
            }
          ?>
      </table>
      </center>
    </div>
  </body>
</html>