<?php 
function indexAction () {
    session_start();
    require ('views/homepage/index.php');
}