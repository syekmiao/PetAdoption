<?php
$pas = "wd(vLsUV9M";

$hostName = "localhost";
$dbUser = "shimo";
$dbPassword = $pas;
$dbName = "petadoption";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>