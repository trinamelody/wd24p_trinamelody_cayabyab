<?php
include_once("../../../api/login.php");

if(empty($_SESSION['username'])){
    header('Location: ../../login.php');
}