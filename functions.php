<?php
                                   
                                     

                                        
                                        
                                   $cat = $_GET['cat'];              
                                   $sql2= "SELECT roomName FROM floor WHERE floorNumber = ? ";
                                   if($stmt=$conn->prepare($sql2)){
                                       $stmt->bind_param('s', $cat);
                                       $stmt->execute();
                                       $r_set=$stmt->get_result();
           
                                       echo "<select id=s2 name=roomName class='box'>";
           
           
                                   }
           
                                   
                                   
                                   while($row=$r_set->fetch_assoc()){
                                       echo"<option value= $row[roomName]>$row[roomName]</option>";
                                   }
                                   echo "</select>";
                                    ?>