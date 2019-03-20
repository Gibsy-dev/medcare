<div class="row" style="margin-top:20px">
<div class="col-sm-3">
<form action="" method="post">
<div class="form-group">
<input type="text" name="searchreq" id="" class="form-control">
<button type="submit" name="search" class="btn btn-primary">search</button>
</div>
</form>
</div>
<div class="col-sm-9"></div>
</div>
<div class="row">

<div class="col-sm-12">
<?php
if(isset($_POST['search'])){
    $search_no=$_POST['searchreq'];
    $selr="SELECT * FROM request WHERE medcare_no='$search_no' AND status !='completed'";
    $qq=$connect->query($selr);
    echo "<form action='labtech.php?request' method='POST' class='form-vertical' ><div class='row><div class='col-sm-6'><div class='form-group'>
    <label for='request_name' class='form-label'>Request Name</label>
    <select name='request_id[]' class='form-control'>";
    while($fetch=$qq->fetch_object()){
        $rid=$fetch->request_id;
        $rname=$fetch->request_name;
        echo "
        <option value='$rid'>$rname</option>
      ";
        

    }
echo "  </select>
</div></div>
<div class='col-sm-6><div class='form-group'>
<label for='result' class='form-label'>Results</label>
<textarea name='results' class='form-control'></textarea>
</div></div>

</div>
<div class='row'><div class='col-sm-12' style='text-align:center'><button name='addresult' type='submit' class='btn btn-success'>Add Results</button></div></div>
<form>";


}
if(isset($_POST['addresult'])){
    foreach($_POST['request_id'] as $idd){
        $result=$_POST['results'];
        $updatee="UPDATE request SET result='$result',lab_tech='$labtech_id',status='completed' WHERE request_id='$idd'";
        
        if(mysqli_query($connect,$updatee)){
            echo "<div class='alert alert-success'>Updated successfully</div>";
        }else{
            echo "<div class='alert alert-danger'>Error occurred</div>";
            
        }


    }
}
?>
</div>
</div>