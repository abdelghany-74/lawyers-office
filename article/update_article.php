<?php 

include '../shared/conn.php';
include '../shared/header.php';
include '../shared/nav.php';


  //* Edit
//id while Edit
$art_id = $_GET['editid'];
//variable
$update= "SELECT * FROM articles WHERE article_id= $art_id";
$select_update = mysqli_query($connection , $update);
$row = mysqli_fetch_assoc($select_update);
$art_id = $row['article_id'];
$title = $row['article_title'];
$desc = $row['article_desc'];

//update
if(isset($_POST['update'])){
  $art_id = $_POST['artid'];
  $title= $_POST['artname'];
  $desc = $_POST['artdesc'];
  $image = $_FILES['image'];
  $image_name = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $location = "./upload/$image_name";
  move_uploaded_file($tmp_name, $location);
  
  $update = "UPDATE articles SET article_id=$art_id,article_title='$title',article_desc='$desc',
  article_image='$image_name',create_time=default,upload_time=default WHERE article_id = $art_id";
  
  $check=mysqli_query($connection , $update);
  if($check){
    echo "Successfully updated";
  }
  header("Location: display_art.php");
}
?>
<div class="insert-box">
  <h2>Edit Articles</h2>
  <form method="POST" action="" enctype="multipart/form-data">
    <div class="user-box">
      <input type="text" name="artid" required value="<?php echo $art_id;?>" />
      <label>Article ID</label>
    </div>
    <div class="user-box">
      <input type="text" name="artname" required value="<?php echo $title;?> " />
      <label>Article title</label>
    </div>
    <div class="user-box">
      <input type="text" name="artdesc" required value="<?php echo $desc;?>" />
      <label>Article Desc</label>
    </div>
    <div class="user-box">
      <input class="form-control" type="file" name="image">
      <label for="" style="font-size: 16px;">Article Profile</label>
    </div>
    <button name="update">Update</button>
  </form>
</div>

<?php include '../shared/footer.php'; ?>