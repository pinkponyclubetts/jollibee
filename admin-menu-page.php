<html>
  <head>
    <title>Jollibee - Admin Menu Panel</title>
    <link rel="icon" type="image/png" href="images/jollibee-icon.png">
    <link rel="stylesheet" href="style/admin-menu-page.css">
    <?php
      include("include/db_conn.php");

      // Declaration of Variables
      $product_name = $_POST["prod_name"] ?? null;
      $product_description = $_POST["prod_desc"] ?? null;
      $product_price = $_POST["prod_price"] ?? null;
      $sub = $_POST["sub"] ?? null;
      $error = null;

      // Once the user submits the form
      if(isset($sub)) {
        if (empty($product_name) || empty($product_description) || empty($product_price)) {
          $error = "Product name, description and price required.";
        }
        else {
          $create_sql = "INSERT INTO product (product_name, product_description, product_price) VALUES ('$product_name', '$product_description', '$product_price');";
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
      <h1>Product Registration</h1>
      <form action="" method="POST">
        <label>Product Name</label><br>
        <input type="text" name="prod_name" placeholder="Please insert the product name..."><br>
        <label>Product Description</label><br>
        <input type="text" name="prod_desc" placeholder="Please insert the description..."><br>
        <label>Price</label><br>
        <input type="number" name="prod_price" placeholder="Please insert the price..."><br>
        <input type="submit" value="Add" name="sub"><br>
        <?php if(isset($sub)) {echo "<div id='error'>$error</div>";}?>
      </form>
    </div>
    <div id="box3">
      <h1>Menu</h1>
      <center>
      <table border="1">
        <tr>
          <th>Product ID</th>
          <th>Product Name</th>
          <th>Product Description</th>
          <th>Price</th>
          <th>Update</th>
          <th>Delete</th>
        </tr>
        <?php
            include('include/db_conn.php');
            // Update
              $a = $_REQUEST['a'] ?? null;
              // Delete
              $b = $_REQUEST['b'] ?? null;

              if($b){
                  $delete_sql = "DELETE FROM product WHERE product_id = '".$b."'";
                  $delete_qry = mysqli_query($conn, $delete_sql);
              }

            // Shows the table data from SQL and inputs it into the website
            $sql = "SELECT * FROM product";
            $qry = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($qry)) {
          ?>
          <tr>
            <td><?=$row['product_id']?></td>
            <td><?=$row['product_name']?></td>
            <td><?=$row['product_description']?></td>
            <td><?="₱" . $row['product_price']?></td>
            <td><a href="menu-update-page.php?a=<?=$row['product_id']?>"><button type="button" id="edit">Update</button></a></td>
            <td><a href="admin-menu-page.php?b=<?=$row['product_id']?>"><button type="button" id="edit">Delete</button></a></td>
          </tr>
          <?php
            }
          ?>
      </table>
      </center>
    </div>
  </body>
</html>