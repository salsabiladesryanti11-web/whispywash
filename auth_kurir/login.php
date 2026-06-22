<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Kurir</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:linear-gradient(135deg, #243447, #1e293b);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* BOX */

.container{
    width:100%;
    max-width:420px;
}

/* HEADER BRAND */

.header{
    text-align:center;
    color:white;
    font-size:32px;
    font-weight:700;
    margin-bottom:20px;
    letter-spacing:1px;
}

/* FORM BOX */

.form-box{
    background:white;
    padding:40px;
    border-radius:18px;
    box-shadow:0 15px 40px rgba(0,0,0,0.25);
}

.form-box h2{
    text-align:center;
    margin-bottom:25px;
    color:#243447;
}

/* INPUT */

.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#243447;
}

input{
    width:100%;
    padding:12px;
    border:1px solid #d1d5db;
    border-radius:10px;
    font-size:15px;
}

input:focus{
    outline:none;
    border-color:#3b82f6;
}

/* BUTTON */

.btn{
    width:100%;
    padding:12px;
    background:#3b82f6;
    color:white;
    border:none;
    border-radius:10px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
    margin-top:10px;
}

.btn:hover{
    background:#2563eb;
}

/* FOOT TEXT */

.footer-text{
    text-align:center;
    margin-top:15px;
    font-size:13px;
    color:#94a3b8;
}

</style>

</head>

<body>

<div class="container">

    <div class="header">
        Whispy Wash
    </div>

    <div class="form-box">

        <h2>Login Kurir</h2>

        <form action="proses_login.php" method="POST">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" class="btn">
                Login
            </button>

        </form>

        <div class="footer-text">
            Sistem Kurir Whispy Wash Laundry
        </div>

    </div>

</div>

</body>
</html>