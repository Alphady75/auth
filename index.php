<?php

require_once('config/db.php');

define('APP_NAME', "AUTH SYSTEME");

$page = $_GET['page'];

if (!isset($page)) {

   header('Location: index.php?page=register');

}elseif(isset($page) && $page == "login"){
   require 'pages/login.php';
}elseif(isset($page) && $page == "register"){
   require 'pages/register.php';
}elseif(isset($page) && $page == "register-success"){
   require 'pages/register_success.php';
}else{
   require 'pages/404.php';
}