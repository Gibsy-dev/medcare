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
<label for="drug name" class="form-label">Drug Name</label>
<textarea name="drugname" id="" cols="30" rows="3" class="form-control"></textarea>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="quantity" class="form-label">Quantity</label>
<textarea name="quantity" id="" cols="30" rows="3" class="form-control"></textarea>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="frequency" class="form-label">Frequency</label>
<textarea name="frequency" id="" cols="30" rows="3" class="form-control"></textarea>
</div>
</div>

</div>


<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="duration" class="form-label">Duration</label>
<textarea name="duration" id="" cols="30" rows="3" class="form-control"></textarea>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="administration type" class="form-label">Administration_type</label>
<textarea name="admtype" id="" cols="30" rows="3" class="form-control"></textarea>
</div>
</div>
<center><button type="submit" class="btn btn-success" name="addprescription">Add Prescription</button></center>
</div>
</form>
<?php
if(isset($_POST['addprescription'])){
    $medcareno=$_POST['medcareno'];
    $drugname=$_POST['drugname'];
    $quantity=$_POST['quantity'];
    $frequency=$_POST['frequency'];
    $duration=$_POST['duration'];
    $admtype=$_POST['admtype'];
    date_default_timezone_set('Africa/Nairobi');
    $date=date('Y/M/d h:m:s' );
    $insert="INSERT INTO prescriptions(medcare_no,drug_name,quantity,frequency,duration,administration_type,doctor_id)VALUES('$medcareno','$drugname','$quantity','$frequency','$duration','$admtype','$doc_id')";
    if(mysqli_query($connect,$insert)){
        echo "<div class='alert alert-success'>Updated Successfully</div>'";

    }else{
        echo "<div class='alert alert-danger'>Error Occured</div>'";
    }

}
?>

</div>
</div>