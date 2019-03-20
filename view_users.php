<div class="well">
<h3 style="text-align:center">Lab Techs</h3>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>firstname</th>
<th>lastname</th>
<th>labname</th>
<th>Qualifications</th>
<th>username</th>
<th>password</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$select="SELECT * FROM lab_tech";
$query=mysqli_query($connect,$select);
while($array=mysqli_fetch_array($query,MYSQLI_ASSOC)){
    $labtech_id=$array['id'];
    $firstname=$array['firstname'];
    $lastname=$array['lastname'];
    $labname=$array['labname'];
    $qualifications=$array['qualification'];
    $username=$array['username'];
    $passw=$array['password'];
    echo "
    <tr>
    <td>$firstname</td>
    <td>$lastname</td>
    <td>$labname</td>
    <td>$qualifications</td>
    <td>$username</td>
    <td>$passw</td>
    <td><a href='Admin.php?view_users&labtechid=$labtech_id' class='btn btn-danger'>Delete</a></td>
    </tr>
    ";
}
if(isset($_GET['labtechid'])){
    $labid=$_GET['labtechid'];
    $del="DELETE FROM lab_tech WHERE id='$labid'";
    if(mysqli_query($connect,$del)){
        echo "<div class='alert alert-success'>Deleted successfully</div>";
    }else{
        echo "<div class='alert alert-danger'>$labid</div>";
    }
}
?>
</tbody>
</table>
</div>




<div class="well">
<h3 style="text-align:center">Doctors</h3>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>firstname</th>
<th>lastname</th>
<th>labname</th>
<th>Qualifications</th>
<th>username</th>
<th>password</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$select="SELECT * FROM doctors";
$query=mysqli_query($connect,$select);
while($array=mysqli_fetch_array($query,MYSQLI_ASSOC)){
    $doctor_id=$array['doctor_id'];
    $firstname=$array['firstname'];
    $lastname=$array['lastname'];
    $hosname=$array['hospital_name'];
    $qualifications=$array['qualification'];
    $specialization=$array[''];
    $username=$array['username'];
    $passw=$array['password'];
    echo "
    <tr>
    <td>$firstname</td>
    <td>$lastname</td>
    <td>$labname</td>
    <td>$qualifications</td>
    <td>$username</td>
    <td>$passw</td>
    <td><a href='Admin.php?view_users&doctorid=$doctor_id' class='btn btn-danger'>Delete</a></td>
    </tr>
    ";
}
if(isset($_GET['doctorid'])){
    $docid=$_GET['doctorid'];
    $del="DELETE FROM doctors WHERE doctor_id='$docid'";
    if(mysqli_query($connect,$del)){
        echo "<div class='alert alert-success'>Deleted successfully</div>";
    }else{
        echo "<div class='alert alert-danger'>$docid</div>";
    }
}
?>
</tbody>
</table>
</div>