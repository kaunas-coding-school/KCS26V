<?php
$cookieName = 'prisiminti_slaptazodi';
$cookieUserName = 'userName';

if (!isset($_COOKIE[$cookieName]) && isset($_POST['remember_pass'])) {
    setcookie($cookieName, $_POST['remember_pass'], time() + 86400 * 5, '/');
    setcookie($cookieUserName, $_POST['username'], time() + 86400 * 5, '/');
}

?>
<form action="loginForm.php" method="post">
    <input type="text" name="username" placeholder="Enter your username" required
           value="<?php echo $_COOKIE[$cookieUserName] ?? ''; ?>"
    >
    <input type="password" name="password" placeholder="Enter your password" required>
    <input
        type="checkbox"
        id="remember_pass"
        name="remember_pass"
        <?php if(isset($_COOKIE[$cookieName])){ echo 'checked'; } else { echo '';} ?>
    >
    <label for="remember_pass">Prisiminti vartotoja</label>
    <input type="submit" value="LOGIN">
</form>




