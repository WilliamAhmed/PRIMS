
<nav>
    <ul>
    
        <li><a href="./logout.php">Logout</a></li>
        <li><a href="">Refresh</a></li>
        <?php
            if($privilidge=='admin'){
                echo "<li><a href='?location=user&mode=view'>View Users</a></li>";
                //echo "<li><a href''>Refresh</a></li>";
            }
        ?>

        <li><a href="./index.php?location=project&mode=view">Home</a></li>
        <li id='welcomeSign'><a><?php echo ' '.ucfirst($_SESSION["username"]); ?> </a></li>
        <!--<li><img id='menu_logo' href='./include/prims-logo-blue-cutdown.png'/></li>-->
    </ul>
    
</nav>
