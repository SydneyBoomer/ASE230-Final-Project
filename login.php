<?php
    /* current cookies needed:
        is_logged_in
        username
    */

    require_once "helper.php";

    $user_id = "";
    $username = "";
    $email = "";
    $password_hash = "";
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = trim($_POST["email"]) ?? "";
        $password = $_POST["password"] ?? "";

        if ($email === "") {
            $error = "Email is required.";
        }

        if ($password === "") {
            $error = $error . "Password is required.";
        }

        // start verifying passwrd
        $userVerified = verifyPassword($password);

        if ($userVerified) {
            // recreate the authenticated user session
            session_regenerate_id(true);

            header("Location: feed.php");
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bogr</title>

    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <main class="container">
        
        <h1>Login</h1>
        <div class="login">
            <form method="post">
                <div>
                    <label>Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div>
                    <label>Password:</label>
                    <input type="password" name="password" required>
                </div>

                <?php if ($error !== ""): ?>
                    <span>
                        <?= htmlspecialchars($error) ?>
                    </span><br>
                <?php endif; ?>

                <?php if (isset($userVerified) && $userVerified): ?>
                    <span>
                        User Is Authenticated.
                    </span><br>
                <?php endif; ?>

                <?php if (isset($userVerified) && !$userVerified): ?>
                    <span>
                        Cannot verify user password.
                    </span><br>
                <?php endif; ?>

                <button type="submit">Log In</button>

                <br>
                <strong> IF NEW: </strong>
                <button type="button" onclick="window.location.href='createAccount.php'">
                    CREATE ACCOUNT
                </button>

            </form>
        </div>
    </main>

    <script src="scripts/navbar.js"></script>

</body>
</html>