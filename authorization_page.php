<?php include 'links.php'; ?>

<div id="name">
  <?php
  session_start();
  if (isset($_SESSION['user']) == true) {
    echo "<h1>Hello " . $_SESSION['user'] . "!";
  ?>

    <form action="exit.php">
      <button type="submit">Exit</button></p>
    </form>
</div>

<div id="first_box">
<?php
  } else { ?>

  <form name="form_input" method="post">
    <br>
    <p><a>Login</a> <input type="text" size="20" id="login_form"> <a id="login_messeng"></a>
      <br>
    <p><a>Password</a> <input type="password" size="20" id="password_form"> <a id="info_password"></a>

  </form>
  <p> <button id="button_input">Sign in</button>

  <?php }
  ?>


  <form action="registration_page.php">
    <p><button type="submit">Registration</button></p>
  </form>
</div>