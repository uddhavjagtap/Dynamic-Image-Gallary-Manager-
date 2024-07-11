<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Website</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">


</head>

<body>
  <nav class="navbar">
    <div class="logo">
      <img src="logo.png" alt="Logo">
    </div>
    <ul class="nav-links">
      <li><a href="home.php">Home</a></li>
      <li><a href="myaccount.php">Myaccount</a></li>
      <li class="dropdown">
        <a href="#">User</a>
        <div class="dropdown-content">
          <a href="logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

</body>

</html>