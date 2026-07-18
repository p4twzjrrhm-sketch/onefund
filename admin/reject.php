<?php
include "../config.php";

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    $stmt = $conn->prepare("UPDATE deposits SET status='Rejected' WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
}

header("Location: dashboard.php");
exit;
