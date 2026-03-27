<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Login | HerSafe</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI', sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg, #ff4b8b, #6a11cb);
}

.container{
    width:950px;
    height:580px;
    display:flex;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 25px 60px rgba(0,0,0,0.35);
    background:white;
}

.left{
    width:50%;
    background:url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f') no-repeat center center/cover;
    color:white;
    padding:50px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    background-blend-mode: overlay;
    background-color: rgba(0,0,0,0.6);
}

.left h1{
    font-size:36px;
    margin-bottom:25px;
}

.left p{
    font-size:17px;
    line-height:1.7;
}

.quote{
    margin-top:40px;
    font-style:italic;
    font-size:22px;   /* Increased size */
    font-weight:600;
    line-height:1.6;
}

.empower{
    margin-top:20px;
    font-size:18px;
    font-weight:500;
    color:#ffd6f5;
}

.right{
    width:50%;
    padding:70px 60px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}

.right h2{
    margin-bottom:35px;
    color:#333;
    font-size:28px;
}

input{
    width:100%;
    padding:14px;
    margin-bottom:22px;
    border-radius:10px;
    border:1px solid #ccc;
    outline:none;
    transition:0.3s;
}

input:focus{
    border-color:#6a11cb;
    box-shadow:0 0 10px rgba(106,17,203,0.3);
}

button{
    width:100%;
    padding:14px;
    border:none;
    border-radius:10px;
    background: linear-gradient(135deg, #ff4b8b, #6a11cb);
    color:white;
    font-weight:bold;
    font-size:15px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.04);
}

.register-btn{
    margin-top:15px;
    background:#333;
}

.register-btn:hover{
    background:#111;
}

.message{
    margin-top:18px;
    font-weight:bold;
}

.footer-text{
    margin-top:25px;
    font-size:14px;
    color:#666;
}
</style>

</head>
<body>

<div class="container">

<div class="left">
    <h1>SafeHer</h1>
    <p>
        Women rate the places they visit.  
        Share real experiences.  
        Identify safe zones.  
        Protect others before danger finds them.
    </p>

    <div class="quote">
        “Safety is not a privilege. It is a right.”
    </div>

    <div class="empower">
        Empowered women empower the world.
    </div>
</div>

<div class="right">
    <h2>Welcome Back</h2>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
    </form>

    <!-- Register Button -->
    <form action="register.php" method="GET">
        <button type="submit" class="register-btn">Create New Account</button>
    </form>

<?php
if(isset($_POST['email'])){

$email = $conn->real_escape_string($_POST['email']);
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email='$email'");
$user = $result->fetch_assoc();

if($user && password_verify($password,$user['password'])){
    $_SESSION['user_id'] = $user['id'];
    echo "<div class='message' style='color:green;'>Login Success! <a href='index.php'>Go Home</a></div>";
}else{
    echo "<div class='message' style='color:red;'>Wrong Email or Password</div>";
}
}
?>

<div class="footer-text">
    Your review today can protect someone tomorrow.
</div>

</div>

</div>

</body>
</html>