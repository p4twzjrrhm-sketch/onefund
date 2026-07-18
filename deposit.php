<?php
include "config.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

if(isset($_POST['submit'])){

    $amount = $_POST['amount'];
    $trx = trim($_POST['trx_id']);
    $uid = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO deposits(user_id,amount,trx_id) VALUES(?,?,?)");
    $stmt->bind_param("ids",$uid,$amount,$trx);

    if($stmt->execute()){
        $msg = "Deposit request submitted successfully. Please wait for admin approval.";
    }else{
        $msg = "Something went wrong!";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Deposit - OneFund</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body{
font-family:Arial;
background:#f5f5f5;
}
.box{
max-width:400px;
margin:40px auto;
background:#fff;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px #ccc;
}
input,button{
width:100%;
padding:10px;
margin:8px 0;
}
button{
background:#28a745;
color:#fff;
border:none;
}
</style>

</head>
<body>

<div class="box">

<h2>Deposit Request</h2>

<p><b>bKash Personal:</b> 01XXXXXXXXX</p>

<?php
if(isset($msg)){
echo "<p style='color:green;'>$msg</p>";
}
?>

<form method="POST">

<input type="number" name="amount" placeholder="Amount" required>

<input type="text" name="trx_id" placeholder="Transaction ID" required>

<button name="submit">Submit Deposit</button>

</form>

<br>

<a href="dashboard.php">← Back Dashboard</a>

</div>

</body>
</html>
