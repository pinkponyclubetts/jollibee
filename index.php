<html>
  <head>
    <title>Jollibee - Login</title>
    <link rel="icon" type="image/png" href="images/jollibee-icon.png">
    <link rel="stylesheet" href="style/login-page.css">
    <?php
      // Declaration of Variables
      $username = $_POST["username"] ?? null;
      $password = $_POST["password"] ?? null;
      $sub = $_POST["sub"] ?? null;

      // Once the user submits the form
      if(isset($sub)) {
        if (empty($username) || empty($password)) {
          $error = "Username and password required.";
        }
        elseif($username == "admin" && $password == "admin123") {
          header("Location: admin-panel-page.php");
          exit();
        }
        else {
          $error = "Incorrect username or password.";
        }
      }
    ?>
  </head>
  <body>
    <div id="box1">
      <a href="login-page.php">
        <img src="images/jollibee-logo.png" id="logo">
      </a>
    </div>
    <div id="box2">
      <h1>Login to Jollibee</h1>
      <p id="intro">Welcome to Jollibee! Log into an account for the jolliest experience!</p>
      <form action="" method="POST">
        <label>Username</label><br>
        <input type="text" name="username" placeholder="Please insert your username..."><br>
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Please insert your password..."><br>
        <input type="submit" value="Log in" name="sub"><br>
        <?php if(isset($sub)) {echo "<div id='error'>$error</div>";}?>
      </form>
      <hr>
      <p>You don't need an account for Jollibee!</p>
      <a href="customer-page.php">
        <button type="button" id="edit">Guest Mode</button>
      </a>
    </div>
  </body>
</html>
