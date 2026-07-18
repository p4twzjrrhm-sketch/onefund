<?php
include "config.php";

if(isset($_POST['register'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT id FROM users WHERE email=?");
    $check->bind_param("s",$email);
    $check->execute();
    $check->store_result();

    if($check->num_rows > 0){
        $msg = "Email already exists!";
    }else{

        $stmt = $conn->prepare("INSERT INTO users(name,email,password) VALUES(?,?,?)");
        $stmt->bind_param("sss",$name,$email,$password);

        if($stmt->execute()){
            header("Location: login.php?success=1");
            exit;
        }else{
            $msg = "Registration Failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register - OneFund</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
font-family:Arial;
background:#f5f5f5;
}
.box{
width:350px;
margin:50px auto;
background:#fff;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px #ccc;
}
input{
width:100%;
padding:10px;
margin:8px 0;
}
button{
width:100%;
padding:10px;
background:#28a745;
color:#fff;
border:none;
cursor:pointer;
}
</style>
</head>
<body>

<div class="box">
<h2>OneFund Register</h2>

<?php if(isset($msg)) echo "<p style='color:red'>$msg</p>"; ?>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="register">Register</button>

</form>

<p><a href="login.php">Already have an account?</a></p>

</div>

</body>
</html>
