<?php
 include 'header.php'; 
if(isset($_POST['registerr'])){
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];

$username=$_POST['username'];
$password=$_POST['password'];
$hpass=md5($password);
date_default_timezone_set('Africa/Nairobi');
$date=date('Y-M-d :h:m:s');
$medcare_no=rand();
$insert="INSERT INTO patients(medcare_no,firstname,lastname,regDate,username,password)VALUES(?,?,?,?,?,?)";
$qu=$connect->prepare($insert);
$qu->bind_param('ssssss',$medcare_no,$firstname,$lastname,$date,$username,$hpass);
if($qu->execute()){
    echo "<div class='alert alert-success'>Inserted Successfully</div>";
}

}
if(isset($_POST['btnlogin'])){
    $laccount=$_POST['laccount'];
    $lusername=$_POST['lusername'];
    $lpassword=$_POST['lpassword'];
    $hlpass=md5($lpassword);
    if($laccount=="doctor"){
        $select="SELECT * FROM doctors WHERE username='$lusername' AND password='$lpassword'";
        $query=$connect->query($select);
        $count=$query->num_rows;
        if($count==1){
            session_start();
            $_SESSION['username']=$lusername;
            header("location:doctor.php");
        }
    }else if($laccount=="patient"){
        $select="SELECT * FROM patients WHERE username='$lusername' AND password='$hlpass'";
        $query=$connect->query($select);
        $count=$query->num_rows;
        if($count==1){
            session_start();
            $_SESSION['username']=$lusername;
            header("location:patient.php");
        }
    }
    else if($laccount=="labtech"){
        $select="SELECT * FROM lab_tech WHERE username='$lusername' AND password='$lpassword'";
        $query=$connect->query($select);
        $count=$query->num_rows;
        if($count==1){
            session_start();
            $_SESSION['username']=$lusername;
            header("location:labtech.php");
        }
    }else if($laccount=="administrator"){
        $select="SELECT * FROM admin WHERE username='$lusername' AND password='$lpassword'";
        $query=$connect->query($select);
        $count=$query->num_rows;
        if($count==1){
            session_start();
            $_SESSION['username']=$lusername;
            header("location:Admin.php");
        }
    }
    


}


?>

<div class="modal fade" id="register">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<div class="row">
<div class="col-sm-12">
<h3 style="text-align:left"><i class="fa fa-user"></i>&nbsp;&nbsp;Register <span><a href="#" class="close pull-right" data-dismiss="modal" style="text-align:left"><i class="fa fa-close"></i></a></span></h3>

</div>
</div>
</div>
<div class="modal-body">

<form action="index.php" method="POST" class="form-vertical" >
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<span id="ftest"></span>
<input type="text" name="firstname" id="firstname" class="form-control" placeholder="firstname">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<span id="ltest"></span>
<input type="text" name="lastname" id="lastname" class="form-control" placeholder="lastname">
</div>
</div>
</div>







<div class="row">
<div class="col-sm-6">
<div class="form-group">

<label for="username" class="form-label">Username</label>
<input type="text" name="username" id="username" class="form-control" placeholder="username">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="password" class="form-label">Password</label>
<input type="password" name="password" id="password" class="form-control" placeholder="password">
</div>
</div>
</div>
<div id="load"></div>
<center><button type="submit" class="btn btn-primary" name="registerr" id="registerr" style="background-color:#587cca" ><i class="fa fa-pencil"></i>Submit</button></center>


</form>

</div>
</div>
</div>
</div>
<div class="modal fade" id="login">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<div class="row">
<div class="col-sm-12">
<h3 style="text-align:left"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login <span><a href="#" class="close pull-right" data-dismiss="modal" style="text-align:left"><i class="fa fa-close"></i></a></span></h3>

</div>
</div>
<div class="modal-body">

<form action="index.php" method="POST" class="form-vertical">
<div class="form-group">
<label for="usertype" class="form-label">Account</label>
<select name="laccount" id="laccount" class="form-control">
<option value="administrator">Admin</option>
<option value="doctor">Doctor</option>
<option value="patient">Patient</option>
<option value="labtech">Lab Tech</option>

</select>
</div>
<div class="form-group">
<label for="Username" class="form-label">Username</label>
<input type="text" name="lusername" id="lusername" class="form-control">
</div>
<div class="form-group">
<label for="password" class="form-label">Password</label>
<input type="password" name="lpassword" id="lpassword" class="form-control">
</div>
<center><button type="submit" class="btn btn-success" name="btnlogin" id="btnlogin" style="background-color:#587cca"><i class="fa fa-sign-in"></i>&nbsp;Login</button></center>

</form>
</div>

</div>
</div>
</div>
</div>
<div class="row" style="height:450px;"></div>

<?php include 'footer.php'; ?>