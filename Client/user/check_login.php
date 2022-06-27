<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(!(isset($_SESSION['signin']) && $_SESSION['signin'] == true)){
    header('Location:index.php');

}
?>