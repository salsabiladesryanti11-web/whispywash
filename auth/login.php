<!DOCTYPE html>
<html>
<head>

    <title>Login - Whispy Wash</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="auth-container">

    <div class="card">

        <h2 class="auth-title">
            Whispy Wash
        </h2>

        <form action="proses_login.php" method="POST">

            <label>Email</label>

            <br><br>

            <input
            type="email"
            name="email"
            required>

            <br><br>

            <label>Password</label>

            <br><br>

            <input
            type="password"
            name="password"
            required>

            <br><br>

            <button
            type="submit"
            class="btn">

            Login

            </button>

        </form>

        <br>

        <center>

            <a href="register.php">
                Belum punya akun?
            </a>

        </center>

    </div>

</div>

</body>
</html>