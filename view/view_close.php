<?php

if($mode=='close' && isset($_POST["idInput"])){
    
    if(!($action=='kill')){
        $action='kill';
    }
    
    $id= $_POST["idInput"];
    
    include './controller/controller_close.php';
}


?>


<form id='updateForm' action=<?php echo "'index.php?location=".$location."&mode=close'"; ?> method='POST'>
    
    <label class='dataLabel'>ID Number of the <?php echo $location ?> you wish to close</label>
    <input class='formInput' type='text' name='idInput'/><br/><br/>
    <center><input id='updateButton' type='submit' value='Close'/></center>
    
</form>
