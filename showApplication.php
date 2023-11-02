<?php require "sidebar.php"; ?>
<body>
<main class="col-lg-10">
        <div class="ps-lg-12">
            <br/><br/><h1>Own Pets Adopt Application Listing</h1>
        </div>
      </main>
    </div>
<div class="container-fluid" style="margin-left: 100px;">
    <table class="table table-striped" style="max-width: 1180px;">
        <thead>
            <tr>
                <td>#</td>
                <td><b>Adopter Name</b></td>
                <td><b>Reason to Adopt</b></td>
                <td><b>Adopter Phone</b></td>
                <td><b>Adopter Email</b></td>
                <td><b>Adopt Status</b></td>
                <td></td>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                $i = 1;
                require_once "database.php";
                $userId = $_SESSION['id'];
                $petid = $_GET["petid"];
                if (empty($petid)){
                    sleep(1);
                    header("Location:".$_SERVER['HTTP_REFERER']);
                }
                else{
                    $rows = mysqli_query($conn, "SELECT * FROM petadopting WHERE petsID = '$petid' ORDER BY applyID DESC");
                    foreach($rows as $row) :
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["applyName"]; ?></td>
                <td><?php echo $row["applyReason"]; ?></td>
                <td><?php echo $row["applyEmail"]; ?></td>
                <td><?php echo $row["applyPhone"]; ?></td>
                <td><?php echo $row["applyStatus"]; ?></td>
                <td>
                    <a href="adoptDetails.php?applyID=<?php echo $row['applyID'];?>" class="btn btn-info">View More</a>
                    <a href="accept.php?applyID=<?php echo $row["applyID"]; ?>" class="btn btn-warning">Accept</a>
                    <a href="reject.php?applyID=<?php echo $row["applyID"]; ?>" class="btn btn-danger">Reject</a>
                </td>
            </tr>
            <?php endforeach; }?>
        </tbody>
    </table>
</div>
</body>
</html>