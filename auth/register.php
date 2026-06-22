<!DOCTYPE html>
<html>
<head>

    <title>Register - Whispy Wash</title>

    <link rel="stylesheet" href="../assets/style.css">

</head>

<body>

<div class="auth-container">

    <div class="card">

        <h2 class="auth-title">
            Whispy Wash
        </h2>

        <form action="proses_register.php" method="POST">

            <label>Nama Lengkap</label>

            <br><br>

            <input
            type="text"
            name="nama"
            required>

            <br><br>

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

            Register

            </button>

        </form>

        <br>

    </div>

</div>

</body>
</html>