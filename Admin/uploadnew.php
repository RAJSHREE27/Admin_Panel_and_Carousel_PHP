<?php

    require_once('connection.php');

    function debug_to_console($data){ 
        $output = $data; 
        if (is_array($output)) 
            $output = implode(',', $output); 
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>"; 
    }

    if(isset($_POST['submit'])){ 

        $label= $_POST['label'];
        $descp= $_POST['description'];
        
        if(!empty($_POST['active'])){
            $active=1;
        }else{
            $active=0;
        }

        $name = $_FILES['image_im']['name']; 
        $temp_name = $_FILES['image_im']['tmp_name']; 
        
        if(isset($name) and !empty($name)){ 
            $location = 'uploads/'; 

            if(move_uploaded_file($temp_name, $location.$name)){
                echo 'File uploaded successfully';

                $sql = "INSERT INTO carousel (img_title, img_descp, img_path, img_active) VALUES ('$label', '$descp', '$location$name', $active)";

                 if(!$result=$mysqli->query($sql)){
                    echo " failure";
                    exit;
                 }
            } 
        } else { 
            echo 'You should select a file to upload !!'; 
            } 
        }

        header("location: index.php");

?>

