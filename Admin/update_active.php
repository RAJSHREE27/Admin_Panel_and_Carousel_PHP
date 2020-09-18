<?php

    require_once('connection.php');

    function debug_to_console($data){ 
        $output = $data; 
        if (is_array($output)) 
            $output = implode(',', $output); 
        echo "<script>console.log('Debug Objects: " . $output . "' );</script>"; 
    }

    if(isset($_POST['id']) && isset($_POST['active']))
    { 
        $id= $_POST['id'];
        $active= $_POST['active'];
        debug_to_console($id);
        debug_to_console($active);

        $query = "UPDATE carousel SET img_active=$active WHERE id=$id";

        $result=$mysqli->query($query);

        if(!$result){
            echo "failure";
        }

    }


    
?>