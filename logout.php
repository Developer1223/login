<?php
// Delete the authentication cookies by setting their expiration time to the past
setcookie('user_id', '', time() - 3600, '/', '', false, true);
setcookie('username', '', time() - 3600, '/', '', false, true);

// Redirect the user to the login page
header("Location: login.html");
exit();
?>

