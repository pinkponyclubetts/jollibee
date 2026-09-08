<?php
error_reporting(0);
include('include/db_conn.php');

// 1. Gets the Product Details
if (isset($_GET['a'])) {
  $id = $_GET['a'];
  $get_product = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$id'");
  $row = mysqli_fetch_assoc($get_product);
}

// 2. Processes the updated information once the user submits
if (isset($_POST['btn_update'])) {
  $product_id = $_POST['prod_id'];
  $product_name = $_POST['prod_name'];
  $product_description = $_POST['prod_desc'];
  $product_price = $_POST['prod_price'];

  $update_sql = "UPDATE students SET 
                  product_name = '$product_name', 
                  product_description = '$product_description',
                  product_price = '$student_contactno'
                  WHERE student_id = '$student_id'";

  if (mysqli_query($conn, $update_sql)) {
    echo "<script>alert('Product details updated successfully!'); window.location='admin-menu-page.php';</script>";
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}
?>

<html>
  <head>
    <title>Jollibee - Menu</title>
    <link rel="icon" type="image/png" href="images/jollibee-icon.png">
    <link rel="stylesheet" href="style/admin-panel-page.css">
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
		
  </body>
</html>