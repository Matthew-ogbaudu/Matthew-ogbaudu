<?php
unset($_SESSION['Logged_in']);
unset($_SESSION['Username']);
header("location:index.html");
?>