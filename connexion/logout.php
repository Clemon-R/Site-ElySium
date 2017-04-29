<?php
$logout = false;
if (isset($_POST['submit_logout']) && isset($_SESSION['login'])){
session_unset();
session_destroy();
$logout = true;
}
?>