<?php
include 'database.php';

$id = $_GET['id'];
$sql = "SELECT * FROM images WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<?php include 'header_home.php';
?>

<!-- <link rel="stylesheet" href="css/myaccount.css"> -->
<link rel="stylesheet" href="css/update.css">


<div class="form-container">
    <div class="containor">

        <div class="box">
            <form action="update_process.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br>

                <label for="name">Name *</label><br>
                <input type="text" id="name" name="title" value="<?php echo $row['title']; ?>" required>

                <label for="image">Image *</label><br>
                <input type="file" id="image" name="image"><br>
                <img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['title']; ?>" width="100"><br><br>

                <button type="submit" class="btn_update" name="submit">Update</button>
            </form>
        </div>
    </div>
</div>

</body>

</html>