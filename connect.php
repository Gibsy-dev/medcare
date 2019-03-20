<?php
$host="localhost";
$user="root";
$pass="";
$db="medcare";
$connect=new mysqli($host,$user,$pass,$db);
if($connect->connect_error){
    die('Error'.$connect->error.'error-No'.$connect->errorno);

}

?>