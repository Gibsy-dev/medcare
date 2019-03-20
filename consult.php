<div class="row">

<div class="col-sm-9 thumbnail" style="border-radius:0px">
<div id="chat">
<div class="row">
<div class="col-sm-5 thumbnail" style="border-radius:0px">
<?php 
if(isset($_GET['doctor_id'])&& isset($_GET['name'])){
    $d_id=$_GET['doctor_id'];
    $name=$_GET['name'];

echo "<div class='modal-header btn btn-primary btn-block btn-small'><h6>Doctor $name </h6></div>
<div class='modal-body' style='height:400px;overflow-y:auto'>
<div>";
$select="SELECT * FROM messages WHERE receiver_medcare='$medcare_no' || sender_medcare='$medcare_no' AND sender_doctor='$d_id' || receiver_doctor='$d_id'";
$que=mysqli_query($connect,$select);
while($arr=mysqli_fetch_array($que,MYSQLI_ASSOC)){
$message=$arr['message'];
$sender_medcare=$arr['sender_medcare'];
if($sender_medcare==$medcare_no){
    echo "<div class='receiver'>$message</div><br>";

}else{
    echo "<div class='sender'>$message</div><br>";
}
}
echo "</div>
<form method='POST' action='' class='form-vertical'>
<textarea type='text' name='message' class='form-control'></textarea>
<button class='btn btn-success btn-sm' name='send'>Send</button>
</form>
</div>
";
if(isset($_POST['send'])){
    $message=$_POST['message'];
    $insert="INSERT INTO messages(message,sender_medcare,receiver_doctor,read_status)VALUES('$message','$medcare_no','$d_id','unread')";
    $query=mysqli_query($connect,$insert);

}

}
?>
</div>
<div class="col-sm-7">
<div class="row modal-body" style="width:450px;overflow-y:auto">
<h4 style="text-align:center">Requests</h4>
<table class="table table-bordered table-striped table-condensed table-hovered">
<thead>
<tr>
<th>Request Id</th>
<th>Request Name</th>
<th>Result</th>
<th>Lab Name</th>
<th>Labtech</th>
<th>Doctor</th>
<th>Hospital</th>
</tr>
</thead>
<tbody>
<?php 
$se="SELECT * FROM request WHERE  medcare_no='$medcare_no'";
$query=$connect->query($se);
while($fetch_data=$query->fetch_object()){
    $req_id=$fetch_data->request_id;
    $req_name=$fetch_data->request_name;
    $result=$fetch_data->result;
    $labtech=$fetch_data->lab_tech;
    $sel="SELECT * FROM lab_tech WHERE id='$labtech'";
    $fff=$connect->query($sel);
    $data=$fff->fetch_object();
    $labname=$data->labname;
    $tech_name=$data->username;
    $doc_id=$fetch_data->doctor_id;
    $sele="SELECT * FROM doctors WHERE doctor_id='$doc_id'";
    $fe=$connect->query($sele);
    $dataa=$fe->fetch_object();
    $hosname=$dataa->hospital_name;
    $docname=$dataa->username;
    echo "
    <tr>
    <td>$req_id</td>
    <td>$req_name</td>
    <td>$result</td>
    <td>$labname</td>
    <td>$tech_name</td>
    <td>$docname</td>
    <td>$hosname</td>
    </tr>
    ";
}
?>
</tbody>
</table>


</div>

</div>

</div>



</div>

</div>
<div class="col-sm-3">
<h3 style="text-align:center">Available Doctors</h3>
<ul class="list-group">


<?php

$select="SELECT * FROM doctors";
$qq=mysqli_query($connect,$select);

while($fetch=mysqli_fetch_array($qq,MYSQLI_ASSOC)){
    $id=$fetch['doctor_id'];
    $firstname=$fetch['firstname'];
    $lastname=$fetch['lastname'];
    $specialization=$fetch['specialization'];
    $hospital=$fetch['hospital_name'];
    echo "<li class='list-group-item'><a href='patient.php?consult&doctor_id=$id&name=$firstname'>$id.<b>$firstname $lastname</b><br><b>$hospital</b><br>$specialization</a></li>'";

}




?>


</ul>


</div>
</div>