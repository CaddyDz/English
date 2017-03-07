<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=SocialNetwork;charset=utf8', 'root', 'cicada');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>
<h1>Register</h1>
<form action="signup.php" method="post">
  <input type="text" name="username" placeholder="Username ...">
  <input type="password" name="password" placeholder="Password ...">
  <input type="email" name="email" placeholder="someone@somesite.com">
  <input type="submit" name="signup" value="Create account">
</form>
