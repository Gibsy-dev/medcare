<?php 
session_start();
include 'header.php'; 

?>
<div class="row" style="height:500px">
<div class="col-sm-3">

	
		<ul class="list-group noprint"style="margin-top: 20px;"id="quick_licks">
            <li class="list-group-item" style="background:#587cca;color:white">Admin Dashboard</li>
			<li class="list-group-item"><a href="Admin.php?add_users"><i class="fa fa-plus"></i>&nbsp;Add Users</a></li>
            <li class="list-group-item"><a href="Admin.php?view_users"><i class="fa fa-plus"></i>&nbsp;View Users</a></li>
			<li class="list-group-item"><a href="#"><i class="fa fa-hospital"></i>&nbsp;Settings</a></li>
			
			
		</ul>
</div>
<div class="col-sm-9">
<?php
if(isset($_GET['add_users'])){
    include 'add_users.php';
}else if(isset($_GET['view_users'])){
    include 'view_users.php';
}else if(!isset($_GET['add_users']) && !isset($_GET['view_users'])){
    include 'add_users.php';

}
?>
</div>
</div>
</div>
<?php include 'footer.php'; ?>