<?php
session_start();
session_destroy();
header("location: recipehome.html");
exit;
?>
