<?php 
    require "header.php";
    require_once "database.php";
    if (isset($_GET["petid"])){
        $petid = $_GET["petid"];
        include "database.php";

        $sql3 = "SELECT * FROM pets WHERE petID = '$petid'";
        $result = mysqli_query($conn, $sql3);
        $petItem = mysqli_fetch_array($result);
    }
?>

  <div class="container">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <img src="img/<?php echo $petItem["petPicture"]; ?>" alt="" class="card-img-top" 
                height="600" width="100" style="margin: 10px">
        </div>
      </aside>
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            Name: <?php echo $petItem["petName"]; ?>
          </h4>
          <p><?php echo $petItem["petInformation"]; ?></p>

          <div class="row">
            <dt class="col-3">Type:</dt>
            <dd class="col-9"><?php echo $petItem["petType"]; ?></dd>

            <dt class="col-3">Age</dt>
            <dd class="col-9"><?php echo $petItem["petAge"]; ?></dd>

            <dt class="col-3">Breed</dt>
            <dd class="col-9"><?php echo $petItem["petBreed"]; ?></dd>

            <dt class="col-3">Vaccination</dt>
            <dd class="col-9"><?php echo $petItem["vaccination"]; ?></dd>

            <dt class="col-3">Deworm</dt>
            <dd class="col-9"><?php echo $petItem["deworm"]; ?></dd>

            <dt class="col-3">Spray</dt>
            <dd class="col-9"><?php echo $petItem["spray"]; ?></dd>

            <dt class="col-3">Pet Size</dt>
            <dd class="col-9"><?php echo $petItem["petSize"]; ?></dd>

            <dt class="col-3">Pet Color</dt>
            <dd class="col-9"><?php echo $petItem["petColor"]; ?></dd>

            <dt class="col-3">Post Created date</dt>
            <dd class="col-9"><?php echo $petItem["petCreateDate"]; ?></dd>

            <?php 
              if ($petItem["petEditDate"] != "0000-00-00"){ ?>
                <dt class="col-3">Pet Edited date</dt>
                <dd class="col-9"><?php echo $petItem["petEditDate"]; ?></dd>
            <?php
              }
            ?>

            
          </div>

          <hr />
          <a href="adoptApplication.php?petid=<?php $_SESSION['petid'] = $petItem['petID'];?>" class="btn btn-info">Adopt</a>
        </div>
      </main>
    </div>
  </div>
    
