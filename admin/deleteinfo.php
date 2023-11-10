<?php 
    require "adminHeader.php";
    echo "<div class='container-fluid' style='margin-left: 100px;'>";

    if (isset($_GET["infoID"])){
        $infoID = $_GET["infoID"];
        include "../database.php";

        $sql = "DELETE FROM information WHERE infoID = '$infoID'";
        if(mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success'>Delete Successfull. Redirecting in 2 sec.</div>";
            echo '<meta http-equiv="Refresh" content="2; url=admin.php">';
        }
        else{
            echo "<div class='alert alert-danger'>Something's wrong</div>";
        }
    }

    echo "</div>";

?>