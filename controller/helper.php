<?php 

// to filter ubwanted characters
function filter($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// flash messages for js
function message($type,$val){
    return '<div class="alert alert-'.$type.' alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$val.'</div>';
}

?>