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

  <div class="container-xxl py-5">
    <div class="row gx-5">
      <aside class="col-lg-6">
        <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <img src="img/<?php echo $petItem["petPicture"]; ?>" alt="" class="card-img-top" 
                height="600" width="100" style="margin: 10px">
        </div>
      </aside>
      <main class="col-lg-6">
        <div class="ps-xl-3">
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
          <?php if(!empty($_SESSION['id'])){
            if($_SESSION['id'] != $petItem['userID']){  ?>
            <a href="adoptApplication.php?petid=<?php $_SESSION['petid'] = $petItem['petID'];?>" class="btn btn-info">Adopt</a>
            </main>
            </div>
          <?php 
        }
        else { ?>
        </main>
        </div>
        <div class="container-xxl py-5">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>#</td>
                    <td><b>Adopter Name</b></td>
                    <td><b>Reason to Adopt</b></td>
                    <td><b>Adopter Phone</b></td>
                    <td><b>Adopter Email</b></td>

                    <td></td>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php
                    $i = 1;
                    require_once "database.php";
                    //$userId = $_SESSION['id'];
                    if (empty($petid)){
                        sleep(1);
                        header("Location:".$_SERVER['HTTP_REFERER']);
                    }
                    else{
                        $rows = mysqli_query($conn, "SELECT * FROM petadopting WHERE petsID = '$petid' ORDER BY applyID DESC");
                        if(!empty($rows)){
                        foreach($rows as $row) :
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["applyName"]; ?></td>
                    <td><?php echo $row["applyReason"]; ?></td>
                    <td><?php echo $row["applyEmail"]; ?></td>
                    <td><?php echo $row["applyPhone"]; ?></td>
                    <td>
                        <a href="adoptDetails.php?applyID=<?php echo $row['applyID'];?>" class="btn btn-info">View More</a>
                        <a href="accept.php?applyID=<?php echo $row["applyID"]; ?>" class="btn btn-warning">Accept</a>
                        <a href="reject.php?applyID=<?php echo $row["applyID"]; ?>" class="btn btn-danger">Reject</a>
                    </td>
                </tr>
                <?php endforeach; }}?>
            </tbody>
          </table>
        </div>
          
          <?php }}?>
      
    </div>
  </div>
    
