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
<label for="symptoms" class="form-label">Symptoms</label>
<textarea name="symptoms" id="" cols="30" rows="3" class="form-control"></textarea>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="diagnosis" class="form-label">Diagnosis</label>
<textarea name="diagnosis" id="" cols="30" rows="3" class="form-control"></textarea>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="treatmentplan" class="form-label">Treatment Plan</label>
<textarea name="treatmentplan" id="" cols="30" rows="3" class="form-control"></textarea>
</div>
</div>
<center><button type="submit" class="btn btn-success" name="addtreatment">Add Treatment</button></center>
</div>
</form>
<?php
if(isset($_POST['addtreatment'])){
    $medcareno=$_POST['medcareno'];
    $symptoms=$_POST['symptoms'];
    $diagnosis=$_POST['diagnosis'];
    $treatmentplan=$_POST['treatmentplan'];
    date_default_timezone_set('Africa/Nairobi');
    $date=date('Y/M/d h:m:s' );
    $insert="INSERT INTO treatment(medcare_no,symptoms,diagnosis,treatment_plan,treatment_date,doctor_id)VALUES('$medcareno','$symptoms','$diagnosis','$treatmentplan','$date','$doc_id')";
    if(mysqli_query($connect,$insert)){
        echo "<div class='alert alert-success'>Updated Successfully</div>'";

    }else{
        echo "<div class='alert alert-danger'>Error Occured</div>'";
    }

}
?>

</div>
</div>