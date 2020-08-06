<?php
session_start();

if (isset($_SESSION['ar_prisijunges']) && $_SESSION['ar_prisijunges'] === true) {
    header("Location: /admin");
}

$cookieName = 'prisiminti_slaptazodi';
$cookieUserName = 'userName';
if (!isset($_COOKIE[$cookieName]) && isset($_POST['remember_pass'])) {
    setcookie($cookieName, $_POST['remember_pass'], time() + 86400 * 5, '/');
    setcookie($cookieUserName, $_POST['username'], time() + 86400 * 5, '/');
}

session_start();

if (!empty($_GET['neprisijunges'])){
    echo "<div style='color: red'>Access denied</div><br>";
}

if (
    !empty($_POST)
    && isset($_POST['username'])
    && isset($_POST['password'])
    && $_POST['username'] === 'a'
    && $_POST['password'] === 'a'
) {
    $_SESSION['ar_prisijunges'] = true;

    echo "<div style='color: green'>Geri prisijungimo duomenys</div><br>";
    echo "<a href='/admin'>Admin</a>";
} else {
    if (!empty($_POST)){
        echo "<div style='color: red'>Blogi prisijungimo duomenys</div><br>";
    }
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
        <?php if (isset($_COOKIE[$cookieName])) {
            echo 'checked';
        } else {
            echo '';
        } ?>
    >
    <label for="remember_pass">Prisiminti vartotoja</label>
    <input type="submit" value="LOGIN">
</form>




