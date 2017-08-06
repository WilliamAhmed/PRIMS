<?php

class DataManager {
        function executeQuery($query){

            $connection = mysqli_connect('localhost', 'super', 'password', 'riskdatabase');
                
            if(mysqli_connect_errno()){
                printf("Connection Failed: %s\n", mysqli_connect_error());
                exit();
            }
            else
            {
                $query_result = mysqli_query($connection, $query);
            }


            mysqli_close($connection);
            
            return $query_result;
        }

        /* Builds the SQL query required to create a risk record. */
        function createRisk($title, $desc, $impact, $prob, $level,$duedate, $userid, $projid){
            $query = "INSERT INTO Risk (title, description, impact, probability,"
                    ." service_level, due_date, status, userId, projectId) VALUES ('"
                    .$title."','".$desc."','".$impact."','".$prob."','".$level."','".$duedate.
                    "','open','".$userid."','".$projid."');";
            
            $result = DataManager::executeQuery($query);

        }


        /*Builds the SQL query reqquired to update risk record*/
        function updateRisk($riskid, $title, $desc, $impact, $prob, $level,$duedate, $userid){

            $query = "UPDATE Risk ".
                    "SET title ='".$title."',description='".$desc."',impact='".$impact
                    ."',probability='".$prob."',service_level='".$level."',due_date='".$duedate
                    ."',userId='".$userid."' WHERE riskId ='".$riskid."';";

            
            $result = DataManager::executeQuery($query);
        }

        /* Builds the SQL Query required to update a risk such that it's status
         * is set to closed.
         */
        function closeRisk($riskid){

            $query = "UPDATE Risk SET status='closed' WHERE riskId='".$riskid."';";
            
            $result = DataManager::executeQuery($query);
        }

        /*/////////////////////////////////////////////////////////////*/
        /*/////////////////////// DEPARTMENT //////////////////////////*/
        /*/////////////////////////////////////////////////////////////*/

        /* Builds the SQL query required to add a new department record*/
        function createDepartment($manager){
            $query = "INSERT INTO Department(manager) VALUES ('".$manager."');";

            $result = DataManager::executeQuery($query);
        }

        /* Builds the query required to update a department record*/
        function updateDepartment($departmentid,$manager){
            $query = "UPDATE Department SET manager='".$manager.
                    "' WHERE departmentid='".$departmentid."';";

            $result = DataManager::executeQuery($query);
        }

        /*Builds the query required to delete a depaartment record */
        function removeDepartment($departmentid){
            $query = "DELETE FROM Department WHERE departmentid='".departmentid."';";

            $result = DataManager::executeQuery($query);
        }

        /*/////////////////////////////////////////////////////////////*/
        /*///////////////////////// PROJECT ///////////////////////////*/
        /*/////////////////////////////////////////////////////////////*/

        /*Builds the query required to create a new project*/
        function createProject($title,$percent_complete,$proj_completion, $userid){
            $query = "INSERT INTO Project(projectid, title, percentage_complete, project_completion, ".
                    "userId) VALUES ('','".$title."','".$percent_complete."','".$proj_completion
                    ."','".$userid."');";
            $result = DataManager::executeQuery($query);
        }

        /* Builds the query required to update a project */
        function updateProject($projId,$title,$percent_complete,$proj_completion, $userid){
            $query = "UPDATE Project SET title='".$title."',percentage_complete='".$percent_complete
                    ."',project_completion='".$proj_completion."',userId='".$userid.
                    "' WHERE projectId='".$projId."';";
            
            $result = DataManager::executeQuery($query);
        }

        /* Builds the query required to close a project */
        function closeProject($projId){
            $query = "UPDATE Project SET status='closed' WHERE projectId='".$projId."';";
            
            $result = DataManager::executeQuery($query);
        }


        /*/////////////////////////////////////////////////////////////*/
        /*///////////////////////// RISK ACTION ///////////////////////*/
        /*/////////////////////////////////////////////////////////////*/

        /*Builds the query required to create a Risk Action */
        function createRiskAction($riskactionId,$riskid, $desc,$due_date,$priority){
            $query = "INSERT INTO Risk_Action(riskactionid, riskId, description, due_date, priority, status) ".
                    "VALUES('".$riskactionId."','".$riskid."','".$desc."','".$priority."','".$due_date."','open');";
            echo $query;
            $result = DataManager::executeQuery($query);
        }

        /* Builds the query required to update a risk action */
        function updateRiskAction($riskactionId,$desc,$due_date,$priority){
            $query = "UPDATE Risk_Action SET description='".$desc."',due_date='".
                    $due_date."',priority='".$priority."' WHERE riskactionId='".$riskactionId."';";
            echo $query;
            $result = DataManager::executeQuery($query);
        }

        /* Builds the query required to close a risk action */
        function closeRiskAction($riskactionid){
            $query = "UPDATE Risk_Action SET status='closed' WHERE riskactionid='".$riskactionid."';";
            echo $query;
            $result = DataManager::executeQuery($query);
        }


        /*/////////////////////////////////////////////////////////////*/
        /*///////////////////////// RISK ACTION ///////////////////////*/
        /*/////////////////////////////////////////////////////////////*/

        /* Builds the query required to add a user to the system */
        function createUser($userid, $password, $fname, $sname,$email,$telno,$usertype,$departmentid){
            $query = "INSERT INTO User(userid,firstname,surname,email,tel_no,user_type,departmentid)"
                    . "VALUES('".$userid."','".$fname."','".$sname."','".$email."','"
                    . $telno."','".$usertype."','".$departmentid."');";
            $result = DataManager::executeQuery($query);
            
            $query = "INSERT INTO Login(userid, password) VALUES ('".$userid."','".$password."');";
            $result = DataManager::executeQuery($query);
            
        }

        /* Builds the query required to update a user on the system */
        function updateUser($userid, $password, $fname, $sname,$email,$telno,$usertype,$departmentid){
            $query = "UPDATE User SET userid='".$userid."', firstname='".$fname."',"
                    . "surname='".$sname."',email='".$email."', tel_no='".$telno."',"
                    . "user_type='".$usertype."', departmentId='".$departmentid."'"
                    . "WHERE userid='".$userid."';";

            $result = DataManager::executeQuery($query);
            
            $query = "UPDATE Login SET userid='".$userid."', password='".$password."' "
                    . "WHERE userid='".$userid."';";
            
            $result = DataManager::executeQuery($query);
        }

        /* Builds the query required to remove a user from the system */
        function removeUser($userid){
            $query = "DELETE FROM User WHERE userid='".$userid."';";

            $result = DataManager::executeQuery($query);
        }

        function authoriseUser($userid, $password){
            
            $query = "SELECT l.userid AS 'userid', l.password AS 'password',"
                    . " u.user_type AS 'user_type' FROM login l, user u"
                    . " WHERE l.userId='".$userid."'"
                    . " AND l.password='".$password."'"
                    . " AND l.userId=u.userId;";

            $result = DataManager::executeQuery($query);
            return($result);
        }

        
        function getAllOpenProjects(){
            $query = "SELECT p.projectId AS 'Project Code', p.title AS 'Title', "
                    . "p.percentage_complete AS 'Completion %', p.project_completion AS 'Go Live', "
                    . "CONCAT(u.firstname,' ', u.surname) AS 'Project Manager' "
                    . "FROM Project p, User u WHERE p.status='open' AND p.userId=u.userId;";
            
            $result = DataManager::executeQuery($query);
            return $result;
        }
        
        function getAllProjectRisks($projId){
            $query = "SELECT r.riskId AS 'Risk ID', r.title AS 'Title', r.description "
                    . "AS 'Description', r.impact AS 'Impact', r.probability AS 'Probability',"
                    . "r.service_level AS 'Service Level',r.impact * r.probability * r.service_level AS 'Score',"
                    . "r.due_date AS 'Due Date',CONCAT(u.firstname, ' ' ,u.surname) AS 'Owner' "
                    . "FROM Risk r, User u WHERE r.status='open' AND r.projectId='".$projId."' "
                    . "AND r.userId=u.userId;";
            
            $result = DataManager::executeQuery($query);
            return $result;
        }
        
        function getAllRiskActions($riskId){
            $query = "SELECT ra.riskactionid AS 'Action ID', r.title AS 'Risk Title', "/*r.description AS 'Risk Description',"*/
                    . " ra.description AS 'Action', "
                    . "ra.priority AS 'Priority', ra.due_date AS 'Due Date', ra.status AS 'Status' "
                    . "FROM risk_action ra, risk r "
                    . "WHERE r.riskId ='".$riskId."' AND r.riskid=ra.riskid;";
           
            
            $result = DataManager::executeQuery($query);
            return $result;
        }
        
        function getAllUsers(){
            $query = "SELECT l.userid AS 'User ID', l.password AS 'Password', "
                    . "u.firstname AS 'Firstname', u.surname AS 'Surname', u.email AS 'Email',"
                    . "u.tel_no AS 'Tel No', u.user_type AS 'Level', u.departmentId AS 'Dep ID'"
                    . "FROM login l, user u WHERE l.userid=u.userid;";
            
            $result = DataManager::executeQuery($query);
            return $result;
        }
        
        function getProject($projId){
            $query = "SELECT title AS 'Title', "
                    . "percentage_complete AS 'Completion %', project_completion AS 'Go Live', "
                    . "userid AS 'Owner' FROM Project WHERE projectId='".$projId."';";
            
            $result = DataManager::executeQuery($query);
            return $result;
        }
        
        function getRisk($id){
            
            $query = "SELECT title AS 'Title', description AS 'Description', "
                    . "impact AS 'Impact', probability AS 'Probability', "
                    . "service_level as 'Service Level', due_date AS 'Due Date', "
                    . "userid AS 'Owner' FROM Risk WHERE riskid='".$id."';";
            //echo $query;
            $result = DataManager::executeQuery($query);
            return $result;
            
        }
        
        function getRiskAction($id){
            $query = "SELECT description as 'Action', priority AS 'Priority', "
                    . "due_date AS 'Due Date' FROM Risk_action WHERE riskactionid='".$id."';";
            
            $result = DataManager::executeQuery($query);
            return $result;
        }
        
        function getUser($userid){
            $query = "SELECT l.userid AS 'User ID', l.password AS 'Password', u.firstname AS 'Firstname', "
                    . "u.surname AS 'Surname', u.email AS 'Email', u.tel_no AS 'Tel No', u.user_type AS 'Service Level', "
                    . "u.departmentid AS 'Department ID' FROM login l, user u WHERE l.userid ='".$userid."' AND "
                    . "u.userid=l.userid;";
            
            $result = DataManager::executeQuery($query);
            return $result;
        }
}
?>