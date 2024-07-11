<?php
session_start();
if (!isset($_SESSION['id'])) {
  header('Location: login.php');
  exit();
}
$user = $_SESSION['username'];
$id = $_SESSION['id'];

include 'database.php';

$sql = "SELECT * FROM images where user_id =$id";
$result = $conn->query($sql);
$images = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $images[] = $row;
  }
}
?>
<?php include("header_home.php");  ?>


<!-- Image Slider -->
<div id="imageSlider" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Uplodate_images/img3.jpg" class="d-block w-100 vh-100" alt="Slider Image 1">
      <div class="slider-text">
        <h3> Welcome <?php echo $user ?><h3>
      </div>
    </div>

    <?php foreach ($images as $image) : ?>
      <div class="carousel-item">
        <img src="<?php echo $image['image_path']; ?>" class="d-block w-100 vh-100" alt="<?php echo $image['title']; ?>">

        <div class="slider-text">
          <h3><?php echo $image['title']; ?> </h3>
        </div>
      </div>
    <?php endforeach; ?>


  </div>
  <a class="carousel-control-prev" href="#imageSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#imageSlider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-- JavaScript dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="index.js"></script>
</body>

</html>