<?php
include "../config.php";

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows==1){

        $admin = $result->fetch_assoc();

        if(password_verify($password,$admin['password'])){

            $_SESSION['admin']=true;
            $_SESSION['admin_id']=$admin['id'];

            header("Location: dashboard.php");
            exit;

        }else{
            $msg="Wrong Password";
        }

    }else{
        $msg="Admin not found";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Login</title>

<style>

body{
font-family:Arial;
background:#f5f5f5;
}

.box{

max-width:350px;
margin:70px auto;
background:white;
padding:20px;
border-radius:8px;
box-shadow:0 0 10px #ccc;

}

input,button{

width:100%;
padding:10px;
margin:8px 0;

}

button{

background:#0d6efd;
color:white;
border:none;

}

</style>

</head>

<body>

<div class="box">

<h2>Admin Login</h2>

<?php
if(isset($msg)){
echo "<p style='color:red'>$msg</p>";
}
?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>

</div>

</body>
</html>
