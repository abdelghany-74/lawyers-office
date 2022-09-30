<?php
	
	include '../shared/conn.php';
	include '../shared/header.php';
	include '../shared/nav.php';

//? Insert 
if(isset($_POST['submit'])) {
  $law_id = $_POST['lawid'];
  $name = $_POST['lawname'];
  $age = $_POST['lawage'];
  $city = $_POST['lawcity'];
  $salary = $_POST['lawsalary'];
  $ex = $_POST['lawex'];
  $phone = $_POST['lawphone'];
  $email = $_POST['lawemail'];
  $pass = $_POST['lawpass'];
  $image = $_FILES['image'];

  $image_name = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location = "./upload/$image_name";
  move_uploaded_file($tmp_name, $location);

  $insert = "INSERT INTO lawyers VALUES($law_id,'$name',$age,'$city',$salary,
  $ex,'$phone','$email','$pass','$image_name')";
  $checkInsert=mysqli_query($connection, $insert);

  if($checkInsert) {
    echo "Successfully inserted!";
  }
  else{
    echo "Failed to insert!";
  }
}
?>

<div class="insert-box">
  <h2>Insert Lawyers</h2>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="user-box">
      <input type="text" name="lawid" required value="" />
      <label>Lawyer ID</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawname" required value="" />
      <label>Name</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawage" required value="" />
      <label>Age</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawcity" required value="" />
      <label>City</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawsalary" required value="" />
      <label>Salary</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawex" required value="" />
      <label>Experience</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawphone" required value="" />
      <label>Phone</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawemail" required value="" />
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawpass" required value="" />
      <label>Password</label>
    </div>
    <div class="user-box">
      <input class="form-control" type="file" name="image">
      <label for="image" style="font-size: 16px;">Lawyer Image</label>
    </div>
    <button name="submit">Send</button>
  </form>
</div>

<?php include '../shared/footer.php';?>