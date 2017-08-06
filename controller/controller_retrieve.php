<?php

    switch($location){
        
        case 'project':
            $table_data = DataManager::getAllOpenProjects();
            if($mode=='update'){$update_data=DataManager::getProject($id);}
            break;
        
        case 'risk':
            $table_data = DataManager::getAllProjectRisks($id);
            if($mode=='update'){$update_data=DataManager::getRisk($id);}
            break;
        
        case 'riskaction':
            $table_data = DataManager::getAllRiskActions($id);
            if($mode=='update'){$update_data=DataManager::getRiskAction($id);}
            break;
        
        case 'user':
            $table_data = DataManager::getAllUsers();
            if($mode=='update'){$update_data=DataManager::getUser($id);}
            break;
        
    }

?>

