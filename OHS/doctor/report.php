<?php
include("../include/dbconnection.php");
if (isset($_POST['submit'])) {
  if (isset($_POST['field'])&&!empty($_POST['field'])){
    if($_POST['field']=="all")
      $field='%';
    else 
      $field=$_POST['field'];
  }
  else 
     $field='%';
  if (isset($_POST['name'])&&!empty($_POST['name'])){
    $name=$_POST['name'];
  }
  else{
    $name='%';
  }
  if (isset($_POST['date'])&&!empty($_POST['date'])){
    $date=$_POST['date'];
  }
  else
    $date='%';
  $p_id=$_SESSION['id'];
  $query="select now()";
  $query_run=mysqli_query($connect,$query);
  $row=mysqli_fetch_assoc($query_run);
  $query = "SELECT e.name as emp , p.name as pat ,date,time, field,p.patient_id,a.emp_id,app_id,report FROM appointment a join users u join employee_detail e join patient_detail p WHERE a.emp_id like u.user_id and e.emp_id like u.user_id and a.patient_id like p.patient_id  and p.name like '%$name%' and date like '$date' and e.emp_id like '$p_id' and date < CURDATE()";
  $query_run=mysqli_query($connect,$query);
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("head.php");
   ?>
   <script type="text/javascript" src="../jquery/reg.js"></script>
<link rel="stylesheet" type="text/css" href="../css/reg.css"><script>
  $(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
      orientation:"top",
      endDate:'+7d',
    })
  })
</script>
<title>Appointment management</title>
</head>
<body >
 <?php include('../include/header.php'); ?>

<!--main navigation part with logo-->

 <!--contaiener of services options-->
<div class="container-fluid book-banners">
<div class="bg-color">
<?php
include("navig.php");
?>
    <div class="container well" style="width: 60%;">
    <?php
           if(isset($success)){ ?>
            <div class="alert alert-success alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $success;?>
            </div><?php
            } ?>
    <div class="row">
      <form action="#" method="POST" role="form">
        <legend><center>Appointments</center></legend>
        <div class="form-group col-md-1">
        </div>
        <div class="form-group col-md-4">
          <input type="text" class="form-control" name="date" placeholder="Date">
        </div>
        <div class="form-group col-md-4">
          <input type="text" class="form-control" name="name" placeholder="Patient's name">
        </div>
        <button type="submit" class="btn btn-primary col-md-2" name="submit">Submit</button>
      </form>
    </div>
    
    <?php 
      if (isset($query_run)&&isset($_POST['submit'])) {
        echo '<legend><center>Previous Appointments</center></legend>';
      if (mysqli_num_rows($query_run)==NULL) {
        echo '<h2 style="margin-left:5%;">No result found</h2>';
      }
      else {
    ?>
    <div style="margin:2%;">
    <div class="row" style="margin-bottom: 1%;">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-3">Patient</div>
      <div class="col-md-3">Date</div>
      <div class="col-md-2">Time</div>
      <div class="col-md-2">&nbsp;</div>
    </div>
    <?php while($row=mysqli_fetch_assoc($query_run)){ ?>
    <div class="row" style="margin-bottom: 1%;">
    <div class="col-md-1">&nbsp;</div>
      <div class="col-md-3"><?php echo $row['pat']; ?></div>
      <div class="col-md-3"><?php echo $row['date']; ?></div>
      <div class="col-md-2"><?php echo $row['time']; ?></div>
      <div class="col-md-3"><?php if($row['report']==NULL) echo 'Report not uploaded'; else echo '<a href="download.php?loc='.$row['report'].'">Download report</a>';?></div>
    </div>
    <?php }}
      $query = "SELECT e.name as emp , p.name as pat ,date,time, field,p.patient_id,a.emp_id,app_id,report FROM appointment a join users u join employee_detail e join patient_detail p WHERE a.emp_id like u.user_id and e.emp_id like u.user_id and a.patient_id like p.patient_id  and p.name like '%$name%' and date like '$date' and e.emp_id like '$p_id' and date >= CURDATE()";
        $query_run=mysqli_query($connect,$query);
        if(isset($query_run)&&isset($_POST['submit'])){
          echo '<legend><center>Upcoming appointments</center></legend>';
        while($row=mysqli_fetch_assoc($query_run)){ ?>
    <div class="row" style="margin-bottom: 1%;">
      <div class="col-md-1">&nbsp;</div>
      <div class="col-md-3"><?php echo $row['emp']; ?></div>
      <div class="col-md-3"><?php echo $row['date']; ?></div>
      <div class="col-md-2"><?php echo $row['time']; ?></div>
    </div>
    <?php }
    ?>
    <?php }
    else echo '<h2 style="margin-left:5%;">No result found</h2>'; } ?>
    </div>
    </div>   
</div>
 
 </div>

</div>
</div>

<!--news part-->
<?php
include("news-headlines.php");
?>

 
</body>
</html>