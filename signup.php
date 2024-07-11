<?php
session_start();
include 'database.php';


if (isset($_POST['signup'])) {
   $name = $_POST['name'];
   $password = $_POST['password'];


   $query = "SELECT username from users where username='$name' ";
   $result = $conn->query($query);

   // Check if there are any rows returned
   if ($result->num_rows > 0) {
      // Username already exists
      $_SESSION['message'] = "Username '$name' is already taken. Please choose a different username.";
      header('Location:login.php ');

      echo "Username '$name' is already taken. Please choose a different username.";
   } else {
      $password = md5($password);
      $sql = "INSERT INTO users (username, password) VALUES ('$name', '$password')";
      if (mysqli_query($conn, $sql)) {

         header('Location:login.php ');
      }
   }
} 
else {
   echo "errorr";
}
