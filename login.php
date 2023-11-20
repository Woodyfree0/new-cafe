<? if (session_status() == PHP_SESSION_NONE) {
  session_start();} ?>
<? require ('navbar.php'); ?>

<div class="login-container">
        <h2>Login</h2>
        <form action="Auth.php" method="POST"> <!-- Replace "login.php" with your authentication script -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
<? require ('footer.php'); ?>
</html>
