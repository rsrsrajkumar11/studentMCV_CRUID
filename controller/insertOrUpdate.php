<?php
include_once "../model/userServices.php"; //temporary
// require_once "./../model/userServices.php"; //failed wiht other functions
require_once './helper.php';

// associative array for storing errors array and success messages 
$errors=array();
$success=array();

if(isset($_POST['createNew']) || isset($_POST['updateStudent'])){
    $roll=$name=$marks=$oldrollno="";
    // input validation and sanitatization 

    if(isset( $_POST['updateStudent'] )){
        if(empty($_POST['oldrollno'])){
            array_push($errors,"Old roll no : Can not be empty");
        }else{
            $oldrollno=filter($_POST['oldrollno']);
    
            if(!preg_match("/^[0-9]{3}$/",$oldrollno)){
                array_push($errors,"Old roll no : Only 3 digit numbers are alloud");
            }
        }
    }

    if(empty($_POST['rollno'])){
        array_push($errors,"Roll no : Can not be empty");
    }else{
        $roll=filter($_POST['rollno']);
        if(!preg_match("/^[0-9]{3}$/",$roll)){
            array_push($errors,"Roll no : Only 3 digit numbers are alloud");
        }
    }

    if(empty($_POST['name'])){
        array_push($errors,"Name : Name can not be empty");
    }else{
        $name=filter($_POST['name']);
        if(!preg_match("/^[A-Z]{3,15}$/",$name)){
            array_push($errors,"Name : Should be in capital letters and min 3 to 15 character long");
        }
    }
    
    if(empty($_POST['marks'])){
        array_push($errors,"Marks : Marks can not be empty");
    }else{
        $marks=filter($_POST['marks']);
        if(!preg_match("/^[0-9]{3}$/",$marks)){
            array_push($errors,"Marks : Should be in numbers only.");
            array_push($errors,"Marks : Eg 10 = 010, 1 = 001 ,100 = 100.");
        }else if( $marks>100 && $marks >0 ){
            array_push($errors,"Marks : Must be between 0-100.");
        }
    }
    
    if(count($errors)==0){
        
        if(isset( $_POST['createNew'] )){
            $queryResponse=insertOne($roll,$name,$marks);
        }else{

            $queryResponse=updateOne($oldrollno,$roll,$name,$marks);
        }
        $queryResponse=json_decode($queryResponse);
        if(count($queryResponse->errors)!=0)
            array_push($errors ,$queryResponse->errors);
        
        if(count($queryResponse->success)!=0)
            array_push($success,$queryResponse->success);
    }   
    
    $userResponse=array('errors'=>$errors,'success'=>$success);
    echo json_encode($userResponse);
    die();
} 


if(isset($_POST['showAll'])){
    echo fetchAll();
    die();
}

if(isset($_POST['deleteStudent'])){
    $errors=array();
    $success=array();

    if(empty($_POST['rollno'])){
        array_push($errors,"Roll no : Can not be empty");
    }else{
        $roll=filter($_POST['rollno']);

        if(!preg_match("/^[0-9]{3}$/",$roll)){
            array_push($errors,"Roll no : Only 3 digit numbers are alloud");
        }
    }
    if(count($errors)==0){
        $queryResponse=deleteOne($roll);
        $queryResponse=json_decode($queryResponse);
        if(count($queryResponse->errors)!=0)
            array_push($errors ,$queryResponse->errors);
        
        if(count($queryResponse->success)!=0)
            array_push($success,$queryResponse->success);
    }   
    
    $userResponse=array('errors'=>$errors,'success'=>$success);
    echo json_encode($userResponse);
    die();
    
}








?>