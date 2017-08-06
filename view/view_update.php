<?php

if(!$action=='update'){
    echo "<form id='updateForm' action='index.php?location=".$location."&mode=update&action=update&rootid=".$rootid."' method='POST'>";

        echo"<label class='dataLabel'>ID Number of the ". $location ." you wish to update</label>";
        echo "<input class='formInput' type='text' name='idInput'/><br/><br/>";
        echo"<center><input id='updateButton' type='submit' value='Update'/></center>";

    echo"</form>";
}

if($mode='update' && isset($_POST["idInput"]) && !($action=='submit')){
    
    $id = $_POST["idInput"];
    
    
    $update_data = "";
    
    include './controller/controller_retrieve.php';
    
    if($update_data){
        
        $label_array = mysqli_fetch_fields($update_data); //columns
        $input_data_array = mysqli_fetch_array(($update_data)); //data

        echo "<form id='updateForm' action='index.php?location=".$location."&mode=update&id=".$id."&rootid=".$rootid."&action=submit' method='POST'>";
        foreach($label_array As $l){
            $input_name = str_replace(' ', '', $l->name);
            $input_value = $input_data_array[$l->name];
            
           echo "<label class='dataLabel'>".$l->name."</label>";
           
           if($input_name=='GoLive' || $input_name=='DueDate'){
               echo "<input class='formInput' id='datepicker' name='".$input_name."' type=text value='".$input_value."'></input>";
           }else{
               echo "<input class='formInput' name='".$input_name."' type=text value='".$input_value."'></input>";
           }
           
           
           echo "<br/><br/>";


        }
        echo"<center><input id='updateButton' type='submit' value='Update'/></center>";
        echo "</form>";

    }
  
}

include './controller/controller_update.php';

?>