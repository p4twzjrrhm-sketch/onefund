<?php
include "../config.php";

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

$result = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>All Users</title>

<style>

body{
font-family:Arial;
background:#f5f5f5;
margin:20px;
}

table{
width:100%;
border-collapse:collapse;
background:white;
}

th,td{
padding:10px;
border:1px solid #ddd;
text-align:center;
}

th{
background:#0d6efd;
color:white;
}

a{
text-decoration:none;
}

</style>

</head>

<body>

<h2>All Users</h2>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Balance</th>

</tr>

<?php while($row=$result->fetch_assoc()){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= htmlspecialchars($row['name']); ?></td>

<td><?= htmlspecialchars($row['email']); ?></td>

<td>৳<?= number_format($row['balance'],2); ?></td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">← Back Dashboard</a>

</body>
</html>
