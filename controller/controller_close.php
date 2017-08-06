<?php
if ($mode == 'close' && $action == 'kill') {
    switch ($location) {

        case 'project':
            $table_data = DataManager::closeProject($id);
            header("Location: index.php?location=project&mode=view");
            break;

        case 'risk':
            $table_data = DataManager::closeRisk($id);
            header("Location: index.php?location=risk&mode=view&id=".$id);
            break;

        case 'riskaction':
            echo $id;
            $table_data = DataManager::closeRiskAction($id);
            header("Location: index.php?location=riskaction&mode=view&id=".$id);
            break;

        case 'user':
            $table_data = DataManager::removeUser($id);
            header("Location: index.php?location=user&mode=view");
            break;
    }
}
?>

