<?php 
    require "header.php";
    echo "<div class='container'>";

    if (isset($_GET["applyID"])){
        $applyID = $_GET["applyID"];
        include "database.php";

        $sql = "DELETE FROM petadopting WHERE applyID = '$applyID'";
        if(mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success'>Deleted Succesfully. Redirecting in 2 sec.</div>";
            header("refresh:2, url=userApplication.php");
        }
    }

    echo "</div>";

?>