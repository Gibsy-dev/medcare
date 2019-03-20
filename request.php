<div class="row">
<div class="col-sm-6"></div>
<div class="col-sm-6">
<ul class="nav nav-tabs pull-right" style="margin-right:20px">

<li><a href="doctor.php?patient">Chat</a></li>
<li><a href="doctor.php?treatment"class="active btn btn-primary" >Treatment</a></li>
<li><a href="doctor.php?request" >Request</a></li>
<li><a href="doctor.php?prescription" class="btn btn-primary">Prescription</a></li>
</ul>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<form action="" method="post" class="form-vertical">
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="Medcare No" class="form-label">Medcare No</label>
<input type="text" name="medcareno" id="" class="form-control">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="request name" class="form-label">Request Name</label>
<textarea name="requestname" id="" cols="30" rows="3" class="form-control"></textarea>
</div>
</div>

<center><button type="submit" class="btn btn-success" name="addrequest">Add Request</button></center>
</div>
</form>
<?php
if(isset($_POST['addrequest'])){
    $medcareno=$_POST['medcareno'];
    $requestname=$_POST['requestname'];
  
    $insert="INSERT INTO request(medcare_no,request_name,doctor_id)VALUES('$medcareno','$requestname','$doc_id')";
    if(mysqli_query($connect,$insert)){
        echo "<div class='alert alert-success'>Updated Successfully</div>'";

    }else{
        echo "<div class='alert alert-danger'>Error Occured</div>'";
    }

}
?>

</div>
</div>