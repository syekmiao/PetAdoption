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
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" style="margin-bottom: 20px;">
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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Pets</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="dogs.php">Dog</a></li>
              <li><a class="dropdown-item" href="cat.php">Cat</a></li>
              <li><a class="dropdown-item" href="other.php">Others</a></li>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="search.php">Search</a>
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
              if($_SESSION['role'] == 'admin'){
                echo "<a class='nav-link' href='admin/admin.php'><img src='logos/user_icon.png' width='50' height='50' ></a>";
              }else{
                echo "<a class='nav-link' href='user.php'><img src='logos/user_icon.png' width='50' height='50' ></a>";
              }
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

<body>
<div class="container" style="margin-top: 50;">
    <div class="row gx-10">
      <aside class="col">
        <nav id="sidebarMenu" class="d-lg-block sidebar bg-white" style="max-width: 200px; margin-top: 30px;">
        <div class="list-group list-group-flush mx-0.5 mt-3">
            <a href="user.php" class="list-group-item list-group-item-action py-2 ripple" >
            <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>User page</span>
            </a>
            <a class="list-group-item list-group-item-action py-2 ripple" href="userOwnPets.php?status=">
                  <i class="fas fa-chart-area fa-fw me-3"></i><span>Own pets listing |ALL|</span>
            </a>
            <a class="list-group-item list-group-item-action py-2 ripple" href="userOwnPets.php?status=1">
                  <i class="fas fa-chart-area fa-fw me-3"></i><span>-- Not Yet Adopted</span>
            </a>
            <a class="list-group-item list-group-item-action py-2 ripple" href="userOwnPets.php?status=2">
                  <i class="fas fa-chart-area fa-fw me-3"></i><span>-- Adopted Pets</span>
            </a>
            <a href="userApplication.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true"
               data-mdb-toggle="collapse" href="#collapseExample1" aria-expanded="true" aria-controls="collapseExample2">
            <i class="fas fa-chart-area fa-fw me-3"></i><span>Adopt application</span>
            </a>
        </div>
        </nav>
      </aside>
      <!--<main class="col-lg-10">
        <div class="ps-lg-12">
            <br/><br/><h1>User Page</h1>
        </div>
      </main>
    </div>
    start of any other code
</div>
</body> -->