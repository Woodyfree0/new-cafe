<?
if (session_status() == PHP_SESSION_NONE) {
  session_start();}
  
require 'routes.php';
require 'src/view/index.php';