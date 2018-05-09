<?php
session_start();
unset($_SESSION["verifisering"]);
header("location: index.php");