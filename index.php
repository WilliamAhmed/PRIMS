<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="include/layout.css"/>
        
        <!-- JQuery Theme Roller Link -->        
        <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
      <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
      <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css"/>
        <script src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
        
        <script src="./include/utillities.js"></script>
    </head>
    
    <body>
        
        <?php
            
            session_start();
            include "./model/model.php";
            include "./controller/Controller.php";
            echo "<title>".$system_title." - ".ucfirst($location)."</title>"
        ?>
    </body>


</html>