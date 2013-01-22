<?php
session_start();
require('functions.php');
logout();
header('location: ../login_form.php');
?>