<?php 
session_start();

if ((isset($_SESSION['user']) && $_SESSION['user'] != "")){
	include "account.php";
} 
else {
  include "login.php";
}
?>
