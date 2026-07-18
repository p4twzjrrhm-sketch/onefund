<?php
include "config.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard - OneFund</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body{
    font-family:Arial;
    background:#f2f2f2;
    margin:0;
}
.header{
    background:#0d6efd;
    color:#fff;
    padding:15px;
    text-align:center;
}
.card{
    width:90%;
    max-width:400px;
    margin:20px auto;
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.1);
}
.btn{
    display:block;
    text-decoration:none;
    text-align:center;
    background:#0d6efd;
    color:#fff;
    padding:12px;
    margin-top:10px;
    border-radius:6px;
}
.logout{
    background:#dc3545;
}
</style>

</head>
<body>

<div class="header">
<h2>OneFund Dashboard</h2>
</div>

<div class="card">

<h3>Welcome,
<?php echo htmlspecialchars($user['name']); ?>
</h3>

<p><strong>Email:</strong>
<?php echo htmlspecialchars($user['email']); ?>
</p>

<p><strong>Wallet Balance:</strong>
৳ <?php echo number_format($user['balance'],2); ?>
</p>

<a class="btn" href="deposit.php">Deposit</a>

<a class="btn logout" href="logout.php">Logout</a>

</div>

</body>
</html>
