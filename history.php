<?php
include "config.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM deposits WHERE user_id=? ORDER BY id DESC");
$stmt->bind_param("i",$id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Deposit History</title>

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

<h2>My Deposit History</h2>

<table>

<tr>

<th>ID</th>
<th>Amount</th>
<th>TRX ID</th>
<th>Status</th>

</tr>

<?php while($row=$result->fetch_assoc()){ ?>

<tr>

<td><?= $row['id']; ?></td>

<td>৳<?= $row['amount']; ?></td>

<td><?= htmlspecialchars($row['trx_id']); ?></td>

<td><?= htmlspecialchars($row['status']); ?></td>

</tr>

<?php } ?>

</table>

<br>

<a href="dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>
