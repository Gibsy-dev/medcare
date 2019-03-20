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

<div class="col-sm-9 thumbnail" style="border-radius:0px">
<div id="chat">
<div class="row">
<div class="col-sm-6 thumbnail" style="border-radius:0px">
<?php 
if(isset($_GET['message_id'])&& isset($_GET['medcare_no'])){
    $m_id=$_GET['message_id'];
    $medcare_no=$_GET['medcare_no'];

echo "<div class='modal-header btn btn-primary btn-block btn-small'><h6>Patient $m_id </h6></div>
<div class='modal-body' style='height:360px;overflow-y:auto'>
<div>";
$select="SELECT * FROM messages WHERE receiver_medcare='$medcare_no' || sender_medcare='$medcare_no' AND sender_doctor='$doc_id' || receiver_doctor='$doc_id'";
$update="UPDATE messages SET read_status='read' WHERE message_id='$m_id'";
$qq=mysqli_query($connect,$update);
$que=mysqli_query($connect,$select);
while($arr=mysqli_fetch_array($que,MYSQLI_ASSOC)){
$message=$arr['message'];
$sender_medcare=$arr['sender_medcare'];
if($sender_medcare==$medcare_no){
    echo "<div class='sender'>$message</div><br>";

}else{
    echo "<div class='receiver'>$message</div><br>";
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
    $insert="INSERT INTO messages(message,receiver_medcare,sender_doctor,read_status)VALUES('$message','$medcare_no','$d_id','unread')";
    $query=mysqli_query($connect,$insert);

}
?>
</div>
<div class="col-sm-6">
<form action="" method="POST">
<input type="text" name="searchre" id="" class="form-control"><button name='search' type='submit' class="btn btn-primary">Search</button>
</form>
<?php
if(isset($_POST['search'])){
    
    
    ?>


<div class="modal-body" style="width:360px;overflow-y:auto">
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
$search_no=$_POST['searchre'];
$se="SELECT * FROM request WHERE medcare_no='$search_no' AND status ='completed'";
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
<?php } ?>
<?php
}
?>


</div>



</div>

</div>
</div>


<div class="col-sm-3">
<h3 style="text-align:center">Patient Notifications</h3>
<ul class="list-group">


<?php

$read="unread";
$select="SELECT * FROM messages WHERE receiver_doctor='$doc_id' AND read_status ='$read'";
$qq=mysqli_query($connect,$select);

while($fet=mysqli_fetch_array($qq,MYSQLI_ASSOC)){
    $message_id=$fet['message_id'];
    $sender=$fet['sender_medcare'];
   
    $sel="SELECT * FROM patients WHERE medcare_no='$sender'";
    $innn=mysqli_query($connect,$sel);
   
    
        $ff=mysqli_fetch_array($innn,MYSQLI_ASSOC);
        $firstname=$ff['firstname'];
        $lastname=$ff['lastname'];
        echo "<li class='list-group-item'><a href='doctor.php?patient&message_id=$message_id&medcare_no=$sender'>$firstname $lastname</b></a></li>'";
    
    
    

}




?>


</ul>


</div>
</div>