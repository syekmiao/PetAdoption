<?php require "sidebar.php"; ?>
<main class="col-lg-10">
        <div class="ps-lg-12">
            <br/><br/><h1>Your adopt application listing </h1>
        </div>
      </main>
    </div>
<div class="container-fluid" style="margin-left: 100px;">
    <table class="table table-striped" style="max-width: 1180px;">
        <thead>
            <tr>
                <td>#</td>
                <td><b>Pet Picture</b></td>
                <td><b>Pet Name</b></td>
                <td><b>Pet Type</b></td>
                <td><b>Adopt Status</b></td>
                <td><b>Pet Owner Comments</b></td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
                $i = 1;
                require_once "database.php";
                if(empty($_SESSION['id'])){
                    echo "<div class='alert alert-danger'>Login expired, please login again. Refresh in 1 sec...</div>";
                    header("refresh:1, url=login.php");
                }
                else{
                    $userId = $_SESSION['id'];
                    $rows = mysqli_query($conn, "SELECT * FROM petadopting WHERE userID = '$userId' ORDER BY applyID DESC");
                    foreach($rows as $row) :
                        $petIDs = $row["petsID"];
                        $sql5 = "SELECT * FROM pets WHERE petID = '$petIDs'";
                        $result = mysqli_query($conn, $sql5);
                        $petItem = mysqli_fetch_array($result);
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><img src="img/<?php echo $petItem["petPicture"]; ?>" width="200" height="200" title="<?php echo $petItem["petPicture"]; ?>"></td>
                <td><?php echo $petItem["petName"]; ?></td>
                <td><?php echo $petItem["petType"]; ?></td>
                <td><?php echo $row["applyStatus"]; ?></td>
                <td><?php echo $row["ownerCommments"]; ?></td>
                <td>
                    <!--<a href="adoptDetails.php?applyID=<?php //echo $row["applyID"];?>" class="btn btn-info">View Application Form</a>-->
                    <a href="editApplication.php?applyID=<?php echo $row["applyID"]; ?>" class="btn btn-warning">Edit Application Form</a>
                    <a href="deleteApplication.php?applyID=<?php echo $row["applyID"]; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; }?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>