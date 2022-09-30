<?php 

include '../shared/conn.php';
include '../shared/header.php';
include '../shared/nav.php';

$select = "SELECT * FROM articles";
$showAll =  mysqli_query($connection, $select);

//! DElete
if(isset($_GET['deleteid'])) {

  $art_id = $_GET['deleteid'];
  $delete = "DELETE FROM articles WHERE article_id = $art_id ";
  $checkDelete=mysqli_query($connection, $delete);
  if ($checkDelete) {
    header("location: display_art.php");
    echo "Successfully deleted";
  }
  else {
    echo "Unsuccessfully deleted!";
  }
}
?>
<!--==================== Portfolio section ====================-->
<section class="portfolio" id="portfolio">
  <h2 class="section_title">Articles</h2>
  <div class="content">
    <?php foreach ($showAll as $data) { ?>
    <div class="p-card" style="height: 500px;">
      <div class=" icon">
        <img src="../Upload/<?php echo $data['article_image']; ?>" alt="">
      </div>
      <div class="info">
        <h3><?= $data['article_title'] ?></h3>
        <p>
          <?= $data['article_desc'] ?>
        </p>
        <a href="Update_article.php?editid=<?php echo $data['article_id'] ?>" class="button">
          Edit <em class="uil uil-edit button_icon"></em>
        </a>
        <a href="display_art.php?deleteid=<?= $data['article_id']?>" class="button">
          Delete <em class="uil uil-trash button_icon"></em>
        </a>
      </div>
    </div>
    <?php } ?>
</section>
<?php include '../shared/footer.php';?>