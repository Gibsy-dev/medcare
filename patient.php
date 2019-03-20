<?php 
session_start();
include 'header.php'; ?>
<div class="row" style="height:500px">
<div class="col-sm-3">

	
		<ul class="list-group noprint"style="margin-top: 20px;"id="quick_licks">
            <li class="list-group-item" style="background:#587cca;color:white">Patient Dashboard</li>
			<li class="list-group-item"><a href="patient.php?consult"><i class="fa fa-plus"></i>&nbsp;Consult Doctor</a></li>
            <li class="list-group-item"><a href="patient.php?notifications"><i class="fa fa-notification"></i>&nbsp;Notifications<i class="badge">1</i></a></li>
			<li class="list-group-item"><a href="patient.php?treatment"><i class="fa fa-hospital"></i>&nbsp;Treatment History</a></li>
			
			
		</ul>
</div>
<div class="col-sm-9">
<?php
if(isset($_GET['consult'])){
    include 'consult.php';
}else if(isset($_GET['treatment'])){
    include 'treatment.php';
}else if(!isset($_GET['consult'])&& !isset($_GET['treatment'])){
    include 'consult.php';

}
?>
</div>
</div>
</div>
<?php include 'footer.php'; ?>