<?php

setcookie("cookieUser", "", time()+(0), "/", '');
header("Location: ../index.php");
?>
