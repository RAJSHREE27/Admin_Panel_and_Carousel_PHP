<?php
    
    function load_carousel_data()
    {   
        include('./Admin/connection.php');
        $query = "SELECT * FROM carousel";
        $result = $mysqli->query($query);

        if($result)
        {
            $i=0;
            while($rows=$result->fetch_array(MYSQLI_ASSOC))
            {
                
                $id= $rows['id'];
                $label=$rows['img_title'];
                $descp= $rows['img_descp'];
                $path = $rows['img_path'];
                $active = $rows['img_active'];

                if($active)
                {
                    $finalpath="./Admin/". $path;

                    if($i)
                    {
                            
                            echo "
                            <div class=\"carousel-item\">
                                <img src=\" $finalpath \" class=\"d-block w-100\" alt=\"...\">
                                <div class=\"carousel-caption d-none d-md-block\">
                                    <h5>$label</h5>
                                    <p>$descp</p>
                                </div>
                            </div>
                            ";
                    }//if inside
                    else
                    {
                        echo "
                            <div class=\"carousel-item active\">
                                <img src=\" $finalpath \" class=\"d-block w-100\" alt=\"...\">
                                <div class=\"carousel-caption d-none d-md-block\">
                                    <h5>$label</h5>
                                    <p>$descp</p>
                                </div>
                            </div>
                            ";
                            $i=$i+1;
                    }//else inside
                
                }//if active  
            }//while loop    
        
        }//if result
    }//function

    function carousel_tab()
    {   
        include('./Admin/connection.php');
        $query = "SELECT * FROM carousel";
        $result=$mysqli->query($query);

        if($result){
            $i=0;
            while($rows=$result->fetch_array(MYSQLI_ASSOC)){
                $active = $rows['img_active'];
                if($active){
                    if($i){
                        echo "<li data-target=\"#carouselExampleCaptions\" data-slide-to=\"$i\"></li>";
                    }else{
                        echo "<li data-target=\"#carouselExampleCaptions\" data-slide-to=\"$i\" class=\"active\"></li>";
                        
                    }
                    $i=$i+1;
                    
                }
            }
        }
    }


?>
