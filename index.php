<?php

if(!isset($_SESSION["is_logged_in"])) {
    $_SESSION["is_logged_in"] = false;
} else {
    $_SESSION["is_logged_in"] = true;
}


if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true) {
    // if logged in, redirect to their feed
    header("Location: feed.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bogr</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <main class="container">
        <h1>Welcome to Bogr</h1>
    </main>

    <script src="scripts/navbar.js"></script>

</body>
</html>