<?php

session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}
include 'database.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['title'];
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);

    if ($image) {
        $sql = "UPDATE images SET title='$name', image_path='$target' WHERE id=$id";
    } else {
        $sql = "UPDATE images SET title='$name' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        if ($image && move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Image updated successfully";
        } else {
            echo "Failed to update image";
        }
        header('Location: myaccount.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
