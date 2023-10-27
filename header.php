<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-bottom: 20px;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="logos/pet_adopt_transparent.png" width="160" height="70"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php
            if(empty($_SESSION['username'])){}
            else {
                echo "<li class='nav-item'><a class='nav-link' href='addpet.php'>Add pet</a></li>";
            }
        ?>
      </ul>
      <span class="navbar-text">
        <?php
            if(empty($_SESSION['username'])){
                echo "<a class='nav-link' href='login.php'>Login</a>";
            }
            else {
                echo "<a class='nav-link' href='users.php'><img src='logos/user_icon.png' width='50' height='50' ></a>";
            }
        ?>
      </span>
      <span class="navbar-text" style ='margin: 0 10px 0 30px ;'>
      <?php
            if(empty($_SESSION['username'])){
                
            }
            else {
                echo '<a class="nav-link" href="logout.php">Logout</a>';
            }
        ?>
      </span>
    </div>
  </div>
</nav>
</header>