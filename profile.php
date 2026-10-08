<?php
    // Check if the user is logged in
    if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
        header('Location: login.php');
        exit();
    }

    // Get the user's name from the session
    $name = $_SESSION['username'] ?? 'User';

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
        
        <h1>Welcome, <?php echo htmlspecialchars($name); ?></h1>
    </main>

    <script src="scripts/navbar.js"></script>

</body>
</html>