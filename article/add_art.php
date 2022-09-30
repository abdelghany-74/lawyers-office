<?php

include '../shared/conn.php';
include '../shared/header.php';
include '../shared/nav.php';


//? Insert 
if(isset($_POST['submit'])) {
  $art_id = $_POST['artid'];
  $title = $_POST['artname'];
  $desc = $_POST['artdesc'];
  $image = $_FILES['image'];
  
  $image_name = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location = "../upload/$image_name";
  move_uploaded_file($tmp_name, $location);

  $insert = "INSERT INTO articles VALUES($art_id,'$title','$desc','$image_name',default,default)";
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
  <h2>Insert Articles</h2>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="user-box">
      <input type="text" name="artid" required value="" />
      <label>Article ID</label>
    </div>
    <div class="user-box">
      <input type="text" name="artname" required value="" />
      <label>Article title</label>
    </div>
    <div class="user-box">
      <input type="text" name="artdesc" required value="" />
      <label>Article Desc</label>
    </div>
    <div class="user-box">
      <input class="form-control" type="file" name="image">
      <label for="" style="font-size: 16px;">Article Profile</label>
    </div>
    <button name="submit">Send</button>
  </form>
</div>

<?php include '../shared/footer.php';?>