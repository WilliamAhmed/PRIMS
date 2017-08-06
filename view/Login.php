<?php

    if($mode=='auth' && $_POST["username"] && $_POST["password"])
    {
        $is_authorised = false;
        include "./controller/controller_auth.php";
        
        if($is_authorised){
            header("Location: index.php?location=project&mode=view");
            //$mode="view";
            include "./view/main_page.php";
        }
        else
        {
          
        }
    }

?>
<div id="loginScreen">
        
        <form id='loginForm' action="?location=login&mode=auth" method="POST">
            <img src="./include/prims-logo-blue-cutdown.png"/>
            <input id="loginField" type="text" name="username" placeholder="Username"/><br/>
            <input id="loginField" type="password" name="password" placeholder="Password"/><br/>
            <input id="loginButton" type="submit" value="Login"/>
        </form>
</div>
