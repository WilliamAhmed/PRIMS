<?php

if($action=='submit'){
    
    switch($location){
        
        case 'project':
            if(isset($_POST["Title"])&&isset($_POST["Completion%"])
                    &&isset($_POST["GoLive"])&&isset($_POST["Owner"])){
                
                DataManager::updateProject($id, $_POST["Title"],$_POST["Completion%"],
                        $_POST["GoLive"],$_POST["Owner"]);
                
                header("Location: index.php?location=project&mode=view");
            }
            break;
        
        case 'risk':
            if(isset($_POST["Title"])&&isset($_POST["Description"])&&isset($_POST["Impact"])
                    &&isset($_POST["Probability"])&&isset($_POST["ServiceLevel"])&&isset($_POST["DueDate"])
                    &&isset($_POST["Owner"])){
                DataManager::updateRisk($id,$_POST["Title"],$_POST["Description"],
                        $_POST["Impact"],$_POST["Probability"],$_POST["ServiceLevel"],
                        $_POST["DueDate"],$_POST["Owner"]);
                
                header("Location: index.php?location=risk&mode=view&id=".$rootid);
            }
            break;
        
        case 'riskaction':
            if(isset($_POST["Action"])&&isset($_POST["Priority"])&&isset($_POST["DueDate"])){
                
                DataManager::updateRiskAction($id, $_POST["Action"], 
                        $_POST["DueDate"], $_POST["Priority"]);
                header("Location: index.php?location=riskaction&mode=view&id=".$rootid);
            }
            break;
      
        case 'user':
            if(isset($_POST["UserID"])&&isset($_POST["Password"])&&isset($_POST["Firstname"])
                    &&isset($_POST["Surname"])&&isset($_POST["Email"])&&isset($_POST["TelNo"])
                    &&isset($_POST["ServiceLevel"])&&isset($_POST["DepartmentID"])){
                
                DataManager::updateUser($_POST["UserID"],$_POST["Password"],$_POST["Firstname"],
                        $_POST["Surname"],$_POST["Email"],$_POST["TelNo"],$_POST["ServiceLevel"],$_POST["DepartmentID"]);
                
                header("Location: index.php?location=user&mode=view");
            }
            break;
        
    }
}
?>
