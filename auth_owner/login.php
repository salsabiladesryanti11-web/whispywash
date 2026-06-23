<!DOCTYPE html>
<html>
<head>
<title>Login Whispy Wash</title>

<style>
body{
    margin:0;
    font-family:Segoe UI;
    background:#f4f8fb;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.card{
    background:white;
    padding:30px;
    border-radius:15px;
    width:350px;
    box-shadow:0 5px 20px rgba(0,0,0,.2);
    text-align:center;
}

h2{
    color:#2E6E9E;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ddd;
    border-radius:10px;
}

button{
    width:100%;
    padding:12px;
    background:#5CC8C6;
    border:none;
    color:white;
    border-radius:10px;
    font-weight:bold;
}
</style>
</head>

<body>

<div class="card">

<h2>Login Owner</h2>

<form method="POST" action="login_proses.php">

<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>

<button type="submit">Login</button>

</form>

</div>

</body>
</html>