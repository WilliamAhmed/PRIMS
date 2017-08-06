<?php
    include './view/menu.php';
?>

<div id='pageHeader'>
    <img id='logo' src='./include/prims-logo-blue-cutdown.png' height='50px'/>
    <span id="pageTitle"><?php echo ucfirst($location); ?></span>
</div>

<?php

    switch ($mode) {

        case 'view':
            echo "<center>";
            echo "<table id='dataTable'>";

            include './view/view_table.php';

            echo "</table><center>";

            include './view/view_buttons.php';
            break;

        case 'create':
            include './view/view_create.php';
            break;

        case 'update':
            include './view/view_update.php';
            break;

        case 'close':
            include './view/view_close.php';
            break;

        case 'closed':
            include './view/view_close.php';
            break;
    }

?>