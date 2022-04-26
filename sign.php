<?php
session_start();
require_once 'includes.php';
$user = new User($db_conn);

if (isset($_POST['submit'])) {
  $email = $_POST['Email'];
  $Name = $_POST['Name'];
  $password = $_POST['password'];
  if ($Name === "" || $password === "" || $email = "") {
    $error[] = "provide username & password !";
    if (strlen($password) < 6) {
      $error[] = "Password must be atleast 6 characters";
    }
  };
  $user->register($Name, $password, $email);
  header('Location: sign.php');
}

if (isset($_POST['login'])) {
  $Name = $_POST['login_Name'];
  $password = $_POST['login_password'];

  if ($user->login($Name, $password)) {
    header('Location: contact.php');
  } else {
    $error = "Please Verify ur Name or Password !!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <h1 hidden="true" id="msg"></h1>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">


        <form method="POST" class="sign-in-form">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="login_Name" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="login_password" placeholder="Password" />
          </div>
          <input type="submit" name="login" value="login" class="btn " />
          <p class="social-text">Connectez-vous avec vos plateformes sociales !</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form method="POST" class="sign-up-form">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" name="Name" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" name="Email" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" />
          </div>
          <input type="submit" class="btn" value="Sign up" name="submit" />
          <p class="social-text">
            Connectez-vous avec vos plateformes sociales !</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h1>C'est votre première fois ?</h1>
          <p>
            Commencer votre aventure
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
          <?php
            if (isset($err) and !(empty($err))){
                echo "<script>new Toast({message: '$err',type: 'danger'});</script>";
            }
        ?>
        </div>
        <img src="./imgs/undraw_my_app_re_gxtj.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h1>vous êtes déjà membre ?</h1>
          <p>
            Connecter vous !
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="./imgs/undraw_welcome_cats_thqn.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="app.js"></script>

  <script>

$(document).ready(function() {
    $("#basic-form").validate({
        rules: {
            email : {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 3
            },
            username: {
                required: true,
                minlength: 3,
                maxlength: 10
            }
        }
    });
});

</script>
</body>
</html>