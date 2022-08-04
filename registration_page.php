<?php include 'links.php'; ?>

<div id="name">
  <?php
  session_start();
  if (isset($_SESSION['user']) == true) {
    echo "<h1>Hello " . $_SESSION['user'] . "!";
  ?>

    <form action="exit.php">
      <p><button type="submit">Exit</button></p>
    </form>
</div>

<div id="first_box">
<?php
  } else {
?>

  <form action="home.php">
    <br>
    <a>Login</a> <input type="text" size="10" id="login_form"> <a id="login_messeng"></a>
    <br><br>
    <a>Password</a> <input type="password" size="10" id="password_form"> <a id="info_password"></a>
    <br><br>
    <a>confirm Password</a> <input type="password" size="10" id="password_confirm_form"> <a id="info_confirm_password"></a>
    <br><br>
    <a>email</a> <input type="text" size="20" id="email_form"> <a id="info_email"></a>
    <br><br>
    <a>name</a> <input type="text" id="name_form" size="10"> <a id="info_name"></a>
  </form>
  <p><button type="submit" id="button_registration">Registration</button> </p>


<?php } ?>
<form action="authorization_page.php">
  <p><button type="submit">Sign in</button></p>
</form>
</div>