<?php require "sidebar.php"; ?>
<main class="col-lg-10">
        <div class="ps-lg-12">
            <br/><br/><h1>Own Pet listing </h1>
        </div>
      </main>
    </div>
<div class="container-fluid" style="margin-left: 100px;">
    <table class="table table-striped" style="max-width: 1180px;"  >
        <thead>
            <tr>
                <td>#</td>
                <td><b>Pet Picture</b></td>
                <td><b>Pet Name</b></td>
                <td><b>Pet Type</b></td>
                <td><b>Adopt Status</b></td>
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
                    $status = $_GET['status'];
                    if (empty($status)){
                        $rows = mysqli_query($conn, "SELECT * FROM pets WHERE userID = '$userId' ORDER BY petID DESC");
                    }
                    else if ($status == 1){
                        $rows = mysqli_query($conn, "SELECT * FROM pets WHERE userID = '$userId' AND petStatus = 'not' ORDER BY petID DESC");
                    }
                    else if ($status == 2){
                        $rows = mysqli_query($conn, "SELECT * FROM pets WHERE userID = '$userId' AND petStatus = 'Adopted' ORDER BY petID DESC");
                    }
                    else{
                        $rows = mysqli_query($conn, "SELECT * FROM pets WHERE userID = '$userId' ORDER BY petID DESC");
                    }
                    foreach($rows as $row) :
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><img src="img/<?php echo $row["petPicture"]; ?>" width="200" height="200" title="<?php echo $row["petPicture"]; ?>"></td>
                <td><?php echo $row["petName"]; ?></td>
                <td><?php echo $row["petType"]; ?></td>
                <td><?php echo $row["petStatus"]; ?></td>
                <td>
                    <a href="petDetails.php?petid=<?php echo $row['petID'];?>" class="btn btn-info">View More</a>
                    <a href="edit.php?petid=<?php echo $row["petID"]; ?>" class="btn btn-warning">Edit</a>
                    <a href="delete.php?petid=<?php echo $row["petID"]; ?>" class="btn btn-danger">Delete</a>
                    <a href="showApplication.php?petid=<?php echo $row["petID"]; ?>" class="btn btn-secondary">Application</a>
                </td>
            </tr>
            <?php endforeach; }  ?>
        </tbody>
    </table>
</div>
</div>
</div>
</body>
</html>