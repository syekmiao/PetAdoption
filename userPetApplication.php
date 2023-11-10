<?php require "sidebar.php"; ?>
<main class="col-lg-10">
        <div class="ps-lg-12">
            <br/><br/><h1>All Your pets adopt apply listing </h1>
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
                    $rows = mysqli_query($conn, "SELECT * FROM pets WHERE userID = '$userId' ");
                    foreach($rows as $row) :
                        $petIDs = $row["petsID"];
                        $sql5 = "SELECT * FROM petadopting WHERE petsID = '$petIDs'";
                        $results = mysqli_query($conn, $sql5);
                        foreach ($results as $result):
                            $adoptItem = mysqli_fetch_array($result);
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><img src="img/<?php echo $row["petPicture"]; ?>" width="200" height="200" title="<?php echo $row["petPicture"]; ?>"></td>
                <td><?php echo $row["petName"]; ?></td>
                <td><?php echo $row["petType"]; ?></td>

                <td><?php echo $adoptItem["applyStatus"]; ?></td>
                <td><?php echo $adoptItem["applyReason"]; ?></td>
                <td>
                    <a href="adoptDetails.php?applyID=<?php echo $adoptItem["applyID"];?>" class="btn btn-info">View Application Form</a>
                    <a href="accept.php?applyID=<?php echo $adoptItem["applyID"]; ?>" class="btn btn-warning">Accept</a>
                    <a href="reject.php?applyID=<?php echo $adoptItem["applyID"]; ?>" class="btn btn-danger">Reject</a>
                </td>
            </tr>
            <?php endforeach; endforeach;}?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>