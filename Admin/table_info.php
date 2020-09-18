<?php

    
    function debug_to_console($data){ 
        $output = $data; 
        if (is_array($output)) 
            $output = implode(',', $output); 
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>"; 
    }

    function load_table_data(){
        require_once('connection.php');
        $query = "SELECT * FROM carousel";
        
        $result=$mysqli->query($query);

        if($result){

            while($rows=$result->fetch_array(MYSQLI_ASSOC)){

               // if($rows['id']){
                    $id= $rows['id'];
                    $label=$rows['img_title'];
                    $descp= $rows['img_descp'];
                    $path = $rows['img_path'];
                    $active = $rows['img_active'];

                    if($active){
                        echo "
                            <tr>
                                <td>$id</id>
                                <td>$label</td>
                                <td>$descp</td>
                                <td>$path</td>
                                <td>
                                    <div class=\"form-group\">
                                        <div class=\"form-check\">
                                            <input name=\"active\" class=\"form-check-input\" type=\"checkbox\" id=\"gridCheck\"  Checked>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            ";
                    }else{
                        echo "
                            <tr>
                                <td>$id</id>
                                <td>$label</td>
                                <td>$descp</td>
                                <td>$path</td>
                                <td>
                                    <div class=\"form-group\">
                                        <div class=\"form-check\">
                                            <input name=\"active\" class=\"form-check-input\" type=\"checkbox\" id=\"gridCheck\" >
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            ";
                    }
            }
        }
    }

?>
