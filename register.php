<?php 
require_once('connect.php');
if(isset($_POST)and $_SERVER['REQUEST_METHOD']=="POST"){
    $firstname=trim(strip_tags($_POST['fname'])); 
    $lastname=$_POST['lname'];
    $contacts=$_POST['contacts'];
    $county=$_POST['county'];
    $subcounty=$_POST['subcounty'];
    $account=$_POST['account'];
    
    $username=$_POST['username'];
    $pass=$_POST['password'];
    $dpass=md5($pass);
    $query="INSERT INTO users(firstname,lastname,contacts,county,subcounty,username,password,account)VALUES(?,?,?,?,?,?,?,?)";
        $prepare=$connect->prepare($query);
        $prepare->bind_param('ssssssss',$firstname,$lastname,$contacts,$county,$subcounty,$username,$dpass,$account);
        if($check=$prepare->execute()){
            
            echo "<div class='alert alert-success'>Inserted successfully</div>";
           

        }else{
            echo "<div class='alert alert-danger'>error occurred when inserting</div>";
            

        
    }
}














?>