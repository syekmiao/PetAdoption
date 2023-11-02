<?php 
    require "header.php";
    require_once "database.php";
    if (isset($_GET["applyID"])){
        $applyid = $_GET["applyID"];
        include "database.php";

        $sql3 = "SELECT * FROM petadopting WHERE applyID = '$applyid'";
        $result = mysqli_query($conn, $sql3);
        $applyItem = mysqli_fetch_array($result);
    }
?>

  <div class="container-xxl py-5">
    <div class="row gx-5">
      <main class="col-lg-6">
        <div class="ps-lg-3">
          <h4 class="title text-dark">
            Adopter Full Name: <p><?php echo $applyItem["applyName"]; ?></p>
          </h4>
          <p><h4>Reason to adopt: </h4><?php echo $applyItem["applyReason"]; ?></p>

          <div class="row">
            <dt class="col-9">Adopter Contact Email: </dt>
            <dd class="col-9"><?php echo $applyItem["applyEmail"]; ?></dd>

            <dt class="col-9">Adopter Contact Number: </dt>
            <dd class="col-9"><?php echo $applyItem["applyPhone"]; ?></dd>

            <dt class="col-9">Adopter Contact Living Address: </dt>
            <dd class="col-9"><?php echo $applyItem["applyAddress"]; ?></dd>

            <dt class="col-9">Does Adopter own any pets: </dt>
            <dd class="col-9"><?php echo $applyItem["ownPets"]; ?></dd>

            <dt class="col-9">Does Adopter rent or own their current home: </dt>
            <dd class="col-9"><?php echo $applyItem["house"]; ?></dd>

            <dt class="col-9">Do Adopter's family member/people living in the same house knows and agree them to adopt a pet: </dt>
            <dd class="col-9"><?php echo $applyItem["otherAgrees"]; ?></dd>

            <dt class="col-9">Application Date: </dt>
            <dd class="col-9"><?php echo $applyItem["applyDate"]; ?></dd>
          </div>
          <hr />
          <a href="accept.php?applyID=<?php echo $applyItem['applyID']; ?>" class="btn btn-warning">Accept</a>
          <a href="reject.php?applyID=<?php echo $applyItem['applyID']; ?>" class="btn btn-danger">Reject</a>
        </div>
      </main>
    </div>
  </div>
    
