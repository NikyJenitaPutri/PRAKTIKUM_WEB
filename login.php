 <?php 
session_start();

// Jika sudah login, langsung arahkan ke dashboard
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php?status=already_logged_in");
    exit;
}

// Proses login
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username === "Niky Jenita Putri" && $password === "2409106019") {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php?status=login_success");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ElectroReuse</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div>
                <h1>ElectroReuse</h1>
                <p>Platform Jual Beli Elektronik Bekas</p>
            </div>
            <div>
                <a href="index.php" class="btn btn-primary">Home</a>
                <button id="toggle-dark" class="btn btn-secondary">Dark Mode</button>
            </div>
        </nav>
    </header>

    <main>
        <div class="login-box">
            <h2>Login ke ElectroReuse</h2>

            <form method="POST" action="login.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>

            <?php if ($error): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>

            <div class="info">
                Gunakan username <strong>Niky Jenita Putri</strong> password <strong>2409106019</strong> untuk login
            </div>

            <a href="index.php" class="back-home"> Kembali ke Beranda</a>
        </div>
    </main>

    <footer>
        <p>&copy; 2025 ElectroReuse | All Rights Reserved</p>
    </footer>
    <!-- Load External JavaScript -->
    <script src="script.js"></script>
</body>
</html>
