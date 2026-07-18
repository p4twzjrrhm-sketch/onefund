<?php
include "config.php";

if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id,name,password FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows==1){

        $user = $result->fetch_assoc();

        if(password_verify($password,$user['password'])){

            $_SESSION['user_id']=$user['id'];
            $_SESSION['user_name']=$user['name'];

            header("Location: dashboard.php");
            exit;

        }else{
            $msg="Wrong Password!";
        }

    }else{
        $msg="Account not found!";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login - OneFund</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
font-family:Arial;
background:#f5f5f5;
}
.box{
width:350px;
margin:60px auto;
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
background:#007bff;
color:#fff;
border:none;
cursor:pointer;
}
</style>
</head>
<body>

<div class="box">

<h2>User Login</h2>

<?php
if(isset($_GET['success'])){
echo "<p style='color:green'>Registration Successful.</p>";
}

if(isset($msg)){
echo "<p style='color:red'>$msg</p>";
}
?>

<form method="POST">

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

<p><a href="register.php">Create Account</a></p>

</div>

</body>
</html>
