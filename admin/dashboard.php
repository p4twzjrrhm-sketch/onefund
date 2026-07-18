<?php
include "../config.php";

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

$result = $conn->query("
SELECT deposits.id,
users.name,
users.email,
deposits.amount,
deposits.trx_id,
deposits.status
FROM deposits
JOIN users ON users.id = deposits.user_id
ORDER BY deposits.id DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>

<style>
body{
font-family:Arial;
background:#f5f5f5;
margin:20px;
}

table{
width:100%;
border-collapse:collapse;
background:#fff;
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
padding:6px 10px;
background:green;
color:white;
border-radius:4px;
}

.logout{
background:red;
}
</style>

</head>

<body>

<h2>OneFund Admin Dashboard</h2>

<p>
<a class="logout" href="logout.php">Logout</a>
</p>

<table>

<tr>

<th>ID</th>
<th>User</th>
<th>Email</th>
<th>Amount</th>
<th>TRX</th>
<th>Status</th>
<th>Action</th>

</tr>

<?php while($row=$result->fetch_assoc()){ ?>

<tr>

<td><?= $row['id'] ?></td>

<td><?= htmlspecialchars($row['name']) ?></td>

<td><?= htmlspecialchars($row['email']) ?></td>

<td><?= $row['amount'] ?></td>

<td><?= htmlspecialchars($row['trx_id']) ?></td>

<td><?= $row['status'] ?></td>

<td>

<?php if($row['status']=="Pending"){ ?>

<a href="approve.php?id=<?= $row['id'] ?>">Approve</a>

<?php } ?>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>
