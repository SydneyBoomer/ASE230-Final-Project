<?php
    session_start();
?>

<nav class="navbar">

    <div class="navbar-inner">

        <!-- LEFT SIDE -->
        <div class="navbar-left">

            <img
                src="images/logo.png"
                alt="Bogr logo"
                class="navbar-logo-image"
            >

            <span class="navbar-logo-text">
                Bogr
            </span>

            <ul class="navbar-links">
                <li>
                    <a href="index.php" class="active">Bog Feed</a>
                </li>

                <li>
                    <a href="createPost.php">Bog Submission</a>
                </li>

                <li>
                    <a href="profile.php">Your Bog</a>
                </li>
            </ul>

        </div>


        <!-- RIGHT SIDE -->
        <div class="navbar-actions">

            <button id="theme-toggle" class="btn btn-outline">
                <span id="theme-icon">☾</span>
                <span id="theme-text">Dark Mode</span>
            </button>

            <?php if (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true): ?>

                <a href="logout.php" class="btn btn-accent">
                    <span class="login-icon">⇥</span>
                    <span class="login-text">Bog-Out</span>
                </a>

            <?php else: ?>

                <a href="login.php" class="btn btn-accent">
                    <span class="login-icon">⇥</span>
                    <span class="login-text">Bog-In</span>
                </a>

            <?php endif; ?>

        </div>

    </div>

</nav>