<?php
// views/logout.php

session_start();
session_destroy();
header("Location: /sgaf/public/index.php");
exit();
?>