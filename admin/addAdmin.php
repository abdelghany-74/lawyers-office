<?php
	
	include '../shared/conn.php';
	include '../shared/header.php';
	include '../shared/nav.php';

//? Insert 
if(isset($_POST['submit'])) {
  $A_id = $_POST['aid'];
  $name = $_POST['aname'];
  $age = $_POST['aage'];
  $city = $_POST['acity'];
  $salary = $_POST['asalary'];
  $ex = $_POST['aex'];
  $phone = $_POST['aphone'];
  $email = $_POST['aemail'];
  $pass = $_POST['apass'];
  $image = $_FILES['image'];

  $image_name = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location = "./upload/$image_name";
  move_uploaded_file($tmp_name, $location);

  $insert = "INSERT INTO admins VALUES($A_id,'$name',$age,'$city',$salary,$ex,
  '$phone','$email','$pass','$image_name')";
  mysqli_query($connection, $insert);
}
?>

<div class="insert-box">
  <h2>Insert Admins</h2>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="user-box">
      <input type="text" name="aid" required value="" />
      <label>Admin ID</label>
    </div>
    <div class="user-box">
      <input type="text" name="aname" required value="" />
      <label>Name</label>
    </div>
    <div class="user-box">
      <input type="text" name="aage" required value="" />
      <label>Age</label>
    </div>
    <div class="user-box">
      <input type="text" name="acity" required value="" />
      <label>City</label>
    </div>
    <div class="user-box">
      <input type="text" name="aphone" required value="" />
      <label>Phone</label>
    </div>
    <div class="user-box">
      <input type="text" name="aemail" required value="" />
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="text" name="apass" required value="" />
      <label>Password</label>
    </div>
    <div class="user-box">
      <input class="form-control" type="file" name="image">
      <label for="" style="font-size: 16px;">Lawyer Profile</label>
    </div>
    <button name="submit">Send</button>
  </form>
</div>

<?php include '../shared/footer.php';?>