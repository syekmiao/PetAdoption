<?php 
    require "header.php";
    require_once "database.php";
    if (isset($_GET["infoID"])){
        $infoID = $_GET["infoID"];
        include "database.php";

        $sql3 = "SELECT * FROM information WHERE infoID = '$infoID'";
        $result = mysqli_query($conn, $sql3);
        $Item = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
?>

<div class="container-xxl py-5">
    <div class="row gx-5">
        <main class="col-lg-6">
        <div class="ps-lg-3">
            <h4 class="title text-dark">
                Title: <?php echo $Item["infoTitle"]; ?>
            </h4>
            <div class="row">
                <dt class="col-3">Created Date:</dt>
                <dd class="col-9"><?php echo $Item["infoDate"]; ?></dd>
            </div>
            <div class="row">
                <dt class="col-3">Intended for:</dt>
                <dd class="col-9"><?php echo $Item["infoType"]; ?></dd>
            </div><br/>
            <p class="lh-lg "><?php echo nl2br($Item["infoData"]); ?></p>

            
        </main>
    </div>
</div>
    
