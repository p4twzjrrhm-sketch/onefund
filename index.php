<?php
include "config.php";

if(isset($_SESSION['user_id'])){
    header("Location: dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>OneFund</title>

<style>

body{
margin:0;
font-family:Arial,sans-serif;
background:#f5f5f5;
}

.header{
background:#0d6efd;
color:white;
padding:20px;
text-align:center;
}

.container{
max-width:600px;
margin:40px auto;
background:white;
padding:30px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,.1);
text-align:center;
}

.btn{
display:inline-block;
padding:12px 25px;
margin:10px;
background:#0d6efd;
color:white;
text-decoration:none;
border-radius:6px;
}

.btn2{
background:#28a745;
}

.footer{
margin-top:40px;
text-align:center;
color:#777;
}

</style>

</head>

<body>

<div class="header">
<h1>OneFund</h1>
<p>Simple Investment Platform</p>
</div>

<div class="container">

<h2>Welcome to OneFund</h2>

<p>Create your account and submit your deposit request.</p>

<a class="btn" href="register.php">Register</a>

<a class="btn btn2" href="login.php">Login</a>

</div>

<div class="footer">

© <?php echo date("Y"); ?> OneFund

</div>

</body>
</html>
