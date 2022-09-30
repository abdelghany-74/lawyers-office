<?php
	
	include '../shared/conn.php';
	include '../shared/header.php';
	include '../shared/nav.php';


  //* Edit
//id while Edit
$id = $_GET['editid'];
//variable
$update= "SELECT * FROM lawyers WHERE lawyer_id= $id";
$select_update = mysqli_query($connection , $update);
$row = mysqli_fetch_assoc($select_update);

$id = $row['lawyer_id'];
$name = $row['lawyer_name'];
$age = $row['lawyer_age'];
$city = $row['lawyer_city'];
$salary = $row['lawyer_salary'];
$ex = $row['lawyer_EX'];
$phone = $row['lawyer_phone'];
$email = $row['lawyer_email'];
$pass = $row['lawyer_pass'];
//update

if(isset($_POST['update'])){
  $id = $_POST['lawid'];
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
  
  $update = "UPDATE lawyers SET lawyer_id=$id,lawyer_name='$name',lawyer_age=$age,lawyer_city='$city',
  lawyer_salary='$salary',lawyer_EX=$ex,lawyer_phone='$phone',lawyer_email='$email',lawyer_pass='$pass',
  lawyer_image='$image_name' WHERE lawyer_id = $id";
  
  mysqli_query($connection , $update);

  header("Location: display_law.php");
}

?>

<div class="insert-box">
  <h2>Edit Lawyers</h2>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="user-box">
      <input type="text" name="lawid" required value="<?php echo $id; ?>" />
      <label>Lawyer ID</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawname" required value="<?php echo $name; ?>" />
      <label>Name</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawage" required value="<?php echo $age; ?>" />
      <label>Age</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawcity" required value="<?php echo $city; ?>" />
      <label>City</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawsalary" required value="<?php echo $salary; ?>" />
      <label>Salary</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawex" required value="<?php echo $ex; ?>" />
      <label>Experience</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawphone" required value="<?php echo $phone; ?>" />
      <label>Phone</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawemail" required value="<?php echo $email; ?>" />
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="text" name="lawpass" required value="<?php echo $pass; ?>" />
      <label>Password</label>
    </div>
    <div class="user-box">
      <input class="form-control" type="file" name="image" value="">
      <label for="image" style="font-size: 16px;">Lawyer Image</label>
    </div>
    <button name="update">Update</button>
  </form>
</div>

<?php include '../shared/footer.php'; ?>