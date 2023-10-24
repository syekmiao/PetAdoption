<?php 
    require "header.php";

    if (isset($_GET["petid"])){
        $petid = $_GET["petid"];
        include "database.php";

        $sql = "DELETE FROM pets WHERE petID = '$petid'";
        if(mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success'>Deleted Succesfully. Redirecting in 2 sec.</div>";
            header("refresh:2, url=users.php");
        }
    }
?>