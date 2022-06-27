<?php 
// unset($_SESSION);
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(!isset($_SESSION["logged"])){
    header('location:./login'); 
}
