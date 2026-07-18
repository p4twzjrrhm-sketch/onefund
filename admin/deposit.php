<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: index.php");
    exit();
}

include "../config.php";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Deposit Manage</title>
</head>

<body>

<h2>Deposit Management</h2>

<table border="1" cellpadding="10">
<tr>
    <th>ID</th>
    <th>User</th>
    <th>Amount</th>
    <th>Status</th>
    <th>Action</th>
</tr>

</table>

</body>
</html>
