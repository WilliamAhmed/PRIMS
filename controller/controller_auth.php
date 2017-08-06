<?php
    
    if(isset($_POST['username']) && isset($_POST['password']))
    {
       $result = DataManager::authoriseUser($_POST['username'],$_POST['password']);
     
       $row = mysqli_fetch_array($result);
       
       if(($row["userid"]===$_POST['username']) && ($row["password"]===$_POST['password']))
       {
           $_SESSION["username"] = $row["userid"];
           $_SESSION["password"] = $row["password"];
           $_SESSION["privilidge"] = $row["user_type"];
           $_SESSION["loginTime"] = time();
           $is_authorised = true;
       }
       
    }

?>