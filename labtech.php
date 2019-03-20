<?php 
session_start();
include 'header.php'; ?>
<div class="row" style="height:500px">
<div class="col-sm-3">

	
		<ul class="list-group noprint"style="margin-top: 20px;"id="quick_licks">
            <li class="list-group-item" style="background:#587cca;color:white">Labtech Dashboard</li>
			<li class="list-group-item"><a href="lab.php?request"><i class="fa fa-plus"></i>&nbsp;Patient Request</a></li>
            <li class="list-group-item"><a href="#"><i class="fa fa-notification"></i>&nbsp;Lab Notifications<i class="badge">1</i></a></li>
			<li class="list-group-item"><a href="#"><i class="fa fa-hospital"></i>&nbsp;Treatment History</a></li>
			
			
		</ul>
</div>
<div class="col-sm-9">
<?php
if(isset($_GET['request'])){
    include 'lab_request.php';
}else if(!isset($_GET['request'])){
    include 'lab_request.php';

}
?>
</div>
</div>
</div>
<?php include 'footer.php'; ?>