<?php
        
            $table_data = "";
            include './controller/controller_retrieve.php';
              
            if($table_data && $mode=='view'){
                
                $column_array = array();
                $count = 0;
                
                $heading = mysqli_fetch_fields($table_data);
                
                echo "<tr style='background-color: #D8D8E3;'>";
                
                foreach($heading As $h)
                {
                    $column_array[$count] = $h->name;
                    echo "<td class='dataHeading'>". $h->name ."</td>";
                    $count++;
                }  
                echo "</tr>";
                
                while($data = mysqli_fetch_array($table_data)){
                    
                    
                    
                    echo "<tr class='dataRow'>";
                    
                    foreach($column_array As $col){
                        
                        //If currently a project
                        if($location=='project'){
                            echo "<td><a href=?location=risk&mode=view&id=".$data[0].">".$data[$col]."</a></td>";
                        }elseif($location=='risk'){
                            echo "<td><a href=?location=riskaction&mode=view&id=".$data[0].">".$data[$col]."</a></td>";
                        }elseif($location=='riskaction' || $location=='user'){
                            echo "<td>".$data[$col]."</td>";
                        }
                    }
                    echo "</tr>";
                }
                
            }else{
                echo "<h3>No Results Returned</h3>";
            }     
?>