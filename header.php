<?php 
include 'connect.php';
error_reporting(0);
$user=$_SESSION['username'];
$sel="SELECT * FROM patients WHERE username='$user'";
$query=$connect->query($sel);
$fetch=$query->fetch_object();
$medcare_no=$fetch->medcare_no;
$select="SELECT * FROM doctors WHERE username='$user'";
$queryy=$connect->query($select);
$fetchh=$queryy->fetch_object();
$doc_id=$fetchh->doctor_id;
$hospitalname=$fetchh->hospital_name;
$selecto="SELECT * FROM lab_tech WHERE username='$user'";
$queryo=$connect->query($selecto);
$fetcho=$queryo->fetch_object();
$labtech_id=$fetcho->id;
$labname=$fetcho->labname;
?>
<!doctype html>
<html lang="en">
<head>
<title>Medcare</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="csss/font-awesome.min.css">
<style>
.container-fluidd{
    background:#587cca;
}
.white{
    color:white;
}
.orange{
    color:#ca5860;
}
.bgorange{
    background:#ca5860;
}
.black{
    color:black;
}
.receiver{
    background-color:#587cca;
    padding:10px;
    text-align:left;
    margin-right:50%;
    color:white;
}
.sender{
    background-color:orange;
    padding:10px;
    text-align:right;
    margin-left:50%;
    color:white;
}
</style>
</head>
<body>
<div class="container-fluid container-fluidd">
<div class="row" style="padding:20px">
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 white" >
<h3>Medcare</h3>

</div>
<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 white">
<p>Access good health</p>
<p>On a click</p>

</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<?php
if(!isset($_SESSION['username'])){
echo '<a href="#register" data-toggle="modal" class="white unique"  ><i class="fa fa-edit orange"></i>&nbsp;&nbsp;REGISTER &nbsp;&nbsp;</a>
<a href="#login" data-toggle="modal" class="white unique" ><i class="fa fa-sign-in orange"></i>&nbsp;&nbsp;LOGIN &nbsp;&nbsp;</a>';
}else{
    echo "<a href='logout.php' class='white unique'><i class='fa fa-sign-out orange'></i>&nbsp;&nbsp;LOGOUT &nbsp;&nbsp;</a>";
}


?>

<a href="#about" data-toggle="modal" class="white unique" ><i class="fa fa-plus bgorange"></i></a>

</div>
</div>
<div class="container" style="padding:20px;">
<div class="navbar navbar-default">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsebar">
<span class="icon-bar" style="color:#333"></span>
<span class="icon-bar" style="color:#333"></span>
<span class="icon-bar" style="color:#333"></span>
</button>
<a href="#" class="navbar-brand">Medcare</a>
<div class="collapse navbar-collapse" id="collapsebar">
<ul class="nav navbar-nav">
<li><a href="#" class="hover" style="color:black"><i class="fa fa-home"></i>&nbsp;&nbsp;HOME</a></li>
<li><a href="#" class="hover" style="color:black"><i class="fa fa-book"></i>&nbsp;&nbsp;ABOUT US</a></li>
<li><a href="#" class="hover"style="color:black"><i class="fa fa-file"></i>&nbsp;&nbsp;GALLERY</a></li>
<li><a href="#" class="hover" style="color:black"><i class="fa fa-phone"></i>&nbsp;&nbsp;CONTACT US</a></li>
<li><a href="#" class="hover" style="color:black"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;LOCATION</a></li>
<li class="dropdown"><a href="#" data-toggle="dropdown" class="hover" style="color:black"><i class="fa fa-user"></i>&nbsp;&nbsp;ACCOUNT&nbsp;<i class="caret"></i></a>
<ul class="dropdown-menu" style="border:0px;border-top:0px;">
<?php
if(!isset($_SESSION['username'])){
    echo '<li><a href="#register" data-toggle="modal" class="hover" style="color:black"><i class="fa fa-edit"></i>&nbsp;&nbsp;REGISTER</a></li>
    <li><a href="#login"  data-toggle="modal" class="hover" style="color:black"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;LOGIN</a></li>';
}else{
    $user=$_SESSION['username'];
    echo '<li><a href="#" class="hover" style="color:black"><i class="fa fa-user"></i>&nbsp;&nbsp;'.$user.'</a></li>
    <li><a href="logout.php"   class="hover" style="color:black"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;LOGOUT</a></li>';
}
?>

</ul>
</li>
</ul>
</div>
</div>
</div>
</div>
