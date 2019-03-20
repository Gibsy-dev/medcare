<div class="well">
<?php 
if(isset($_POST['adduser'])){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $specialization=$_POST['specialization'];
    $qualifications=$_POST['qualifications'];
    $hoslabname=$_POST['hoslabname'];
    $account=$_POST['account'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($account=="labtech"){
        $insert="INSERT INTO lab_tech(firstname,lastname,labname,qualification,username,password)VALUES('$firstname','$lastname','$hoslabname','$qualifications','$username','$password')";
        if(mysqli_query($connect,$insert)){
            echo "<div class='alert alert-success'>Lab Tech added successfully</div>";
        }else{
            echo "<div class='alert alert-danger'>Error occured</div>";
        }
    }else if($account=="doctor"){
        $insert="INSERT INTO doctors(firstname,lastname,specialization,qualification,hospital_name,username,password)VALUES('$firstname','$lastname','$specialization','$qualifications','$hoslabname','$username','$password')";
        if(mysqli_query($connect,$insert)){
            echo "<div class='alert alert-success'>Doctor added successfully</div>";
        }else{
            echo "<div class='alert alert-danger'>Error occured</div>";
        }
    }
}

?>
<h3 style="text-align:center">Add Doctors/Labtechs</h3>
<hr>
<form action="Admin.php?add_users" method="post" class="form-vertical">
<div class="row">
<div class="col-sm-3">
<div class="form-group">
<label for="firstname" class="form-label">Firstname</label>
<input type="text" name="firstname" id="" class="form-control">
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label for="lastname" class="form-label">Lastname</label>
<input type="text" name="lastname" id="" class="form-control">
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label for="specialization" class="form-label">Specialization(for doctors)</label>
<input type="text" name="specialization" id="" class="form-control">
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label for="qualifications" class="form-label">Qualifications</label>
<input type="text" name="qualifications" id="" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-3">
<div class="form-group">
<label for="hoslabname" class="form-label">Hospital/labname</label>
<input type="text" name="hoslabname" id="" class="form-control">
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label for="account" class="form-label">Account Type</label>
<select name="account" id="" class="form-control">
<option value="labtech">Lab Tech</option>
<option value="doctor">Doctor</option>
</select>

</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label for="username" class="form-label">Username</label>
<input type="text" name="username" id="" class="form-control">
</div>
</div>
<div class="col-sm-3">
<div class="form-group">
<label for="password" class="form-label">Password</label>
<input type="text" name="password" id="" class="form-control">
</div>
</div>
<button type="submit" name="adduser" class="btn btn-success" style="text-align:right;float:right">Add User</button>
</div>

</form>
</div>