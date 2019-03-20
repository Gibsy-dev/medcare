<?php 
session_start();
include 'header.php'; ?>
<div class="row" style="height:500px">
<div class="col-sm-3">

	
		<ul class="list-group noprint"style="margin-top: 20px;"id="quick_licks">
            <li class="list-group-item" style="background:#587cca;color:white">Doctor Dashboard</li>
			<li class="list-group-item"><a href="doctor.php?patient"><i class="fa fa-plus"></i>&nbsp;Patient Notifications</a></li>
            <li class="list-group-item"><a href="doctor.php?notifications"><i class="fa fa-notification"></i>&nbsp;Lab_Tech Notifications<i class="badge">1</i></a></li>
			<li class="list-group-item"><a href="doctor.php?treatment"><i class="fa fa-hospital"></i>&nbsp;Treatment History</a></li>
			
			
		</ul>
</div>
<div class="col-sm-9">
<?php
if(isset($_GET['patient'])){
    include 'docchat.php';
}else if(isset($_GET['request'])){
    include 'request.php';
}else if(isset($_GET['prescription'])){
    include 'prescription.php';
}
else if(isset($_GET['treatment'])){
    include 'treatment.php';
}else if(!isset($_GET['patient'])&& !isset($_GET['treatment']) && !isset($_GET['request']) && !isset($_GET['prescription'])){
    include 'docchat.php';

}
?>
</div>
</div>
</div>
<?php include 'footer.php'; ?>