<?php


if($mode=='create' && $action='submit'){

    switch($location){

        case 'project':
            if(isset($_POST["Title"])&&isset($_POST["Completion%"])&&isset($_POST["GoLive"])
                    &&isset($_POST["ProjectManager"])){
                DataManager::createProject($_POST["Title"],$_POST["Completion%"],$_POST["GoLive"],$_POST["ProjectManager"]);

                header("Location: index.php?location=project&mode=view");     

            }

            break;

        case 'risk':
            if(isset($_POST["Title"])&&isset($_POST["Description"])&&isset($_POST["Impact"])
                    &&isset($_POST["Probability"])&&isset($_POST["ServiceLevel"])&&isset($_POST["DueDate"])
                    &&isset($_POST["Owner"])){
                DataManager::createRisk($_POST["Title"],$_POST["Description"],$_POST["Impact"],
                         $_POST["Probability"],$_POST["ServiceLevel"],$_POST["DueDate"],
                         $_POST["Owner"],$id);

               header("Location: index.php?location=risk&mode=view&id=".$id);                   
            }
            break;

        case 'riskaction':
            if(isset($_POST["Action"])&&isset($_POST["Priority"])&&
                    isset($_POST["DueDate"])){

                DataManager::createRiskAction('',$id,$_POST["Action"],$_POST["Priority"],
                        $_POST["DueDate"]);
                header("Location: index.php?location=riskaction&mode=view&id=".$id);

            }

        case 'user':
            if(isset($_POST["UserID"])&&isset($_POST["Password"])&&isset($_POST["Firstname"])
                    &&isset($_POST["Surname"])&&isset($_POST["Email"])&&isset($_POST["TelNo"])
                    &&isset($_POST["Level"])&&isset($_POST["DepID"])){

                DataManager::createUser($_POST["UserID"],$_POST["Password"],$_POST["Firstname"],
                        $_POST["Surname"],$_POST["Email"],$_POST["TelNo"],$_POST["Level"],$_POST["DepID"]);
                header("Location: index.php?location=user&mode=view");

            }
    }
}
?>

