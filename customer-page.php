<html>
  <head>
    <title>Jollibee - Menu</title>
    <link rel="icon" type="image/png" href="images/jollibee-icon.png">
    <link rel="stylesheet" href="style/customer-page.css">
  </head>
  <body>
    <div id="box1">
      <a href="customer-page.php">
        <img src="images/jollibee-logo.png" id="logo">
      </a>
      <h5 id="user">Guest Mode</h5>
      <a href="login-page.php">
        <h3 id="logout">Log out</h3>
      </a>
    </div>
    <div id="box2">
      <h1>Menu</h1>
      <center>
      <table border="1">
        <tr>
          <th>Product ID</th>
          <th>Product Name</th>
          <th>Product Description</th>
          <th>Price</th>
        </tr>
        <?php
            include('include/db_conn.php');
            $sql = "SELECT * FROM `product`";
            $qry = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($qry)) {
          ?>
          <tr>
            <td><?=$row['product_id']?></td>
            <td><?=$row['product_name']?></td>
            <td><?=$row['product_description']?></td>
            <td><?="₱" . $row['product_price']?></td>
          </tr>
          <?php
            }
          ?>
      </table>
      </center>
    </div>
  </body>
</html>