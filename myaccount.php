<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

include('database.php');

$user_id = $_SESSION['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $title = $_POST['title'];
    $image_name = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_path = 'images/' . $image_name;

    if (move_uploaded_file($image_tmp_name, $image_path)) {
        $query = "INSERT INTO images (user_id, title, image_path) VALUES ($user_id, '$title','$image_path' )";
        if (mysqli_query($conn, $query)) {
            echo "Image uploaded successfully";
            header('Location: myaccount.php');
        }
    }
}


include("header_home.php"); ?>
<link rel="stylesheet" href="css/myaccount.css">
<div class="box">
    <div class="box-left">
        <div class="account-form">
            <form action="myaccount.php" method="post" enctype="multipart/form-data">
                <label for="name">Name *</label><br>
                <input type="text" id="title" name="title" required><br>

                <label for="image">Image *</label><br>
                <input type="file" id="image" name="image" required><br><br>

                <button type="submit" class="btn-upload" name="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="box-right">
        <div class="form">
            <h2>Uploaded Data</h2><br>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Delete</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'database.php';
                    $results = $conn->query("SELECT * FROM images WHERE user_id = $user_id");
                    while ($row = $results->fetch_assoc()) :
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><img src="<?php echo $row['image_path']; ?>" alt="<?php echo $row['title']; ?>" width="100"></td>
                            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn-delete">Delete</a></td>
                            <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn-update">Update</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>