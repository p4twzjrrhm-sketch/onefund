<?php
include "../config.php";

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

if(!isset($_GET['id'])){
    header("Location: dashboard.php");
    exit;
}

$id = (int)$_GET['id'];

// Deposit তথ্য বের করুন
$stmt = $conn->prepare("SELECT * FROM deposits WHERE id=? AND status='Pending'");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 1){

    $deposit = $result->fetch_assoc();

    // Deposit Approved
    $stmt2 = $conn->prepare("UPDATE deposits SET status='Approved' WHERE id=?");
    $stmt2->bind_param("i",$id);
    $stmt2->execute();

    // User Balance Update
    $stmt3 = $conn->prepare("UPDATE users SET balance = balance + ? WHERE id=?");
    $stmt3->bind_param("di",$deposit['amount'],$deposit['user_id']);
    $stmt3->execute();

}

header("Location: dashboard.php");
exit;
