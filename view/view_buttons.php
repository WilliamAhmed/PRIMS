
<div id="buttonSet">
<?php

    switch($location){
        
        case 'project':
            if($privilidge==='admin'){
                echo "<input id='createButton' type='button' value='Add Project' onclick=\"window.location.href='?location=project&mode=create'\"/>";
                echo "<input id='updateButton' type='button' value='Update Project' onclick=\"window.location.href='?location=project&mode=update'\"/>";
                echo "<input id='closeButton' type='button' value='Close Project' onclick=\"window.location.href='?location=project&mode=close'\"/>";
            }
            
            break;
        
        case 'risk':
            echo "<input id='createButton' type='button' value='Create Risk' onclick=\"window.location.href='?location=risk&mode=create&id=".$id."'\"/>";
            echo "<input id='updateButton' type='button' value='Update Risk' onclick=\"window.location.href='?location=risk&mode=update&rootid=".$id."'\"/>";
            echo "<input id='closeButton' type='button' value='Close Risk' onclick=\"window.location.href='?location=risk&mode=close'\"/>";
            echo "<input id='backButton' type='button' value='Back' onclick='goBack();'/>";
            break;
        
        case 'riskaction':
            echo "<input id='createButton' type='button' value='Create Risk Action' onclick=\"window.location.href='?location=riskaction&mode=create&id=".$id."'\"/>";
            echo "<input id='updateButton' type='button' value='Update Risk Action' onclick=\"window.location.href='?location=riskaction&mode=update&rootid=".$id."'\"/>";
            echo "<input id='closeButton' type='button' value='Close Risk Action' onclick=\"window.location.href='?location=riskaction&mode=close'\"/>";
            echo "<input id='backButton' type='button' value='Back' onclick='goBack();'/>";
            break;
        
        case 'user':
            echo "<input id='createButton' type='button' value='Add User' onclick=\"window.location.href='?location=user&mode=create'\"/>";
            echo "<input id='updateButton' type='button' value='Update User' onclick=\"window.location.href='?location=user&mode=update'\"/>";
            echo "<input id='closeButton' type='button' value='Remove User' onclick=\"window.location.href='?location=user&mode=close'\">";
            echo "<input id='backButton' type='button' value='Back' onclick='goBack();'/>";
        
    }
?>

</div>
