<?php

function insertOne($roll,$name,$marks) {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    
    $sql= "insert into student (rollno,name,marks) values($roll,'$name',$marks)";
    if($conn->query($sql)){
        array_push($success,"Your data has been successfully added in database");
        $conn->close();
    }else{
        array_push($errors," Something went wrong, data is not added in database");
    }
    
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

function updateOne($oldrollno,$roll,$name,$marks) {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    
    $sql= "update student set rollno = $roll ,name ='$name',marks=$marks where rollno=$oldrollno";
    if($conn->query($sql)){
        array_push($success,"Your data has been successfully update in database");
        $conn->close();
    }else{
        array_push($errors," Something went wrong, data is not updated in database");
    }
    
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

function deleteOne($roll) {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    
    $sql= "update student set deleteFlg=1 where rollno=$roll";
    if($conn->query($sql)){
        array_push($success,"Your data has been successfully deleted from database");
        $conn->close();
    }else{
        array_push($errors," Something went wrong, data is not deleted from database");
    }
    
    $userResponse=['errors'=>$errors,'success'=>$success];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

function fetchOne($roll) {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    $data=array();
    
    $sql= "select rollno,name,marks from student where rollno=$roll and deleteFlg=0";
    $result=$conn->query($sql);
    if($result->num_rows){
        $data[]=$result->fetch_assoc();
        array_push($success,"Data retrive from database");
        $conn->close();
    }else{
        array_push($errors,"Error occurend while fetching data");
    }
    
    $userResponse=['errors'=>$errors,'success'=>$success,'data'=>$data];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}


function fetchAll() {
    include_once "../model/databaseConfig.php";
    $errors=array();
    $success=array();
    $data=array();
    
    $sql= "select rollno,name,marks from student where deleteFlg=0";
    $result=$conn->query($sql);
    if($result->num_rows){
        while($row=$result->fetch_assoc()){
            $data[]=$row;
        }
        array_push($success,"Data retrive from database");
        $conn->close();
    }else{
        array_push($errors,"Error occurend while fetching data");
    }
    
    $userResponse=['errors'=>$errors,'success'=>$success,'data'=>$data];
    $userResponse=json_encode($userResponse);
    return $userResponse; 
}

/*
left for testing and experementation
*/
// echo __DIR__.__FILE__;
// echo '<pre>';
// echo 'start';
// print_r(fetchOne(122));
// print_r( json_decode( fetchAll() ) );

?>