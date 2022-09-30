<?php 

include './shared/conn.php';
include './shared/header.php';

  if (isset($_POST['login'])) { 
    $name = $_POST["email"];
    $password = $_POST["password"];
    $select = "SELECT * FROM admins where admin_email ='$name' and admin_pass = '$password'";
    $result  = mysqli_query($connection, $select);
    $adminRow=mysqli_num_rows($result);
    if (!empty($adminRow)) {
      $_SESSION["emailadmin"] =$name; 
      header("Location: /Law/admin/admin.php");
  }
    else{
      echo "Your username or password is incorrect,Try again !";
      $select = "SELECT * FROM lawyers where lawyer_email ='$name' and lawyer_pass = '$password'";
      $result  = mysqli_query($connection, $select);
      $adminRow=mysqli_num_rows($result);
    if (!empty($adminRow)) {
      $_SESSION["emaillawyer"] =$name; 
      header("Location: /Law/admin/admin.php");
  }
    else {
      echo "You are logged in!";
  }
  }
}
?>

<div class="login-box">
  <h2>Hello Admin</h2>
  <form method="POST">
    <div class="user-box">
      <input type="text" name="email" required />
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="password" required />
      <label>Password</label>
    </div>
    <button name="login">
      Login
    </button>
  </form>
</div>

<?php include './shared/footer.php' ;?>