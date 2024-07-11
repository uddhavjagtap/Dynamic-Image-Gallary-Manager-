<?php

session_start();
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}
include 'database.php';


$image_id = $_GET['id'];
$userid = $_SESSION['id'];

$query = "DELETE FROM images WHERE id = $image_id AND user_id = $userid ";

if ($conn->query($query) === TRUE) {
    echo "Record deleted successfully";
    header('Location: myaccount.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
