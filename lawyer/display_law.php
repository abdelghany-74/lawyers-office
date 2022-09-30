<?php
	
	include '../shared/conn.php';
	include '../shared/header.php';
	include '../shared/nav.php';

$select = "SELECT * from lawyers";
$showAll =  mysqli_query($connection, $select);

//! DElete
if(isset($_GET['deleteid'])) {

  $law_id = $_GET['deleteid'];
  $delete = "DELETE FROM lawyers WHERE lawyer_id = $law_id ";
  $checkDelete=mysqli_query($connection, $delete);
  if ($checkDelete) {
    header("location: display_law.php");
    echo "Successfully deleted";
  }
  else {
    echo "Unsuccessfully deleted!";
  }
}

?>

<section class="portfolio" id="portfolio">
  <h2 class="section_title">Articles</h2>
  <div class="content">
    <?php foreach ($showAll as $data) { ?>
    <div class="p-card" style="height: 550px;">
      <div class="icon">
        <img src="../Upload/<?php echo $data['lawyer_image']; ?>" alt="">
      </div>
      <div class="info">
        <h3>ID: <?= $data['lawyer_id'] ?></h3>
        <p>
          Name: <?= $data['lawyer_name'] ?>
        </p>
        <p>
          Age: <?= $data['lawyer_age'] ?>
        </p>
        <p>
          Salary: <?= $data['lawyer_salary'] ?>
        </p>
        <p>
          Experience: <?= $data['lawyer_EX'] ?>
        </p>
        <p>
          Phone: <?= $data['lawyer_phone'] ?>
        </p>
        <!-- <p>
          Email: <?= $data['lawyer_email'] ?>
        </p>
        <p>
          Password: <?= $data['lawyer_pass'] ?>
        </p> -->
        <a href="Update_law.php?editid=<?php echo $data['lawyer_id'] ?>" class="button">
          Edit <em class="uil uil-edit button_icon"></em>
        </a>
        <a href="display_law.php?deleteid=<?= $data['lawyer_id']?>" class="button">
          Delete <em class="uil uil-trash button_icon"></em>
        </a>
      </div>
    </div>
    <?php } ?>
</section>
<?php include '../shared/footer.php';?>