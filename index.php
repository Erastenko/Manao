<!DOCTYPE HTML>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<?php include 'links.php'; ?>
<body>
  <div id="name">
    <?php
    session_start();
    if (isset($_SESSION['user']) == true) {
      echo "<h1>Hello " . $_SESSION['user'] . "!";
    ?>
      <form action="exit.php">
        <button type="submit">Exit</button></p>
      </form>
    <?php
    }
    ?>
  </div>
  <div id="first_box">

    <form action="authorization_page.php">
      <p><button type="submit">Sign in</button></p>
    </form>

    <form action="registration_page.php">
      <p><button type="submit">Registration</button></p>
    </form>
  </div>


</body>

</html>