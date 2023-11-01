<?php
session_start();
echo "Please wait...";

session_destroy();
header("Location: /Forum");
?>