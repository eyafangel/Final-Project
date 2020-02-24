<?php

$arr= array();

if($_POST['credential'] == ''){
       
    $arr['success'] = false;
    $arr['result'] = $_POST['credential']; 
} else {
    $arr['success'] = true;
}

echo json_encode($arr);

?>

