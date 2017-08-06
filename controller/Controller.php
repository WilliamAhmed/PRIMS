<?php

    if(isset($_REQUEST['mode'])){$mode=trim($_REQUEST['mode']);}else{$mode="";}
    if(isset($_REQUEST['location'])){$location=trim($_REQUEST['location']);}else{$location="";}
    if(isset($_REQUEST['id'])){$id=trim($_REQUEST['id']);}else{$id="";}
    if(isset($_REQUEST['action'])){$action=trim($_REQUEST['action']);}else{$action="";}
    if(isset($_REQUEST['rootid'])){$rootid=trim($_REQUEST['rootid']);}else{$rootid="";}
    
    if(isset($_SESSION['privilidge'])){$privilidge=$_SESSION['privilidge'];}else{$privilidge="standard";}

    if(!isset($_SESSION["username"]))
    {
        include("view/login.php");
    }
    else   
    {
        include "./view/main_page.php";
    }
    
    include "./model/model.php";

?>