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
  $query="select now()";
  $query_run=mysqli_query($connect,$query);
  $row=mysqli_fetch_assoc($query_run);
  $query = "SELECT e.name as emp , p.name as pat ,date,time, field,p.patient_id,a.emp_id FROM appointment a join users u join employee_detail e join patient_detail p WHERE a.emp_id like u.user_id and e.emp_id like u.user_id and a.patient_id like p.patient_id and field like '$field' and e.name like '%$name%' and date like '$date' and date>= CURDATE()";
  $query_run=mysqli_query($connect,$query);
}
if (isset($_POST['cancel-submit'])) {
  if (!empty($_POST['data'])) {
    require '../mail/PHPMailerAutoload.php';
    foreach ($_POST['data'] as $key ) {
      $value=explode(' ', $key);
      $emp_id=$value[0];
      $patient_id=$value[1];
      $date=$value[2];
      $time=$value[3];
      $doc=$value[4]. ' '.$value[5];
      $query="select * from patient_detail where patient_id like '$patient_id'";
      $run=mysqli_query($connect,$query);
      $row=mysqli_fetch_assoc($run);
      $email=$row['email'];
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        require '../include/smtp.php';                                   // TCP port to connect to
        $mail->setFrom('projectohs5@gmail.com','OHS');
        $mail->addAddress($email);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Appointment cancellation';
        $mail->Body    = 'Your appointment with Dr.'.$doc.' on '.$date.' at time '.$time.' has been canceled';
        $mail->AltBody = 'Your appointment with Dr.'.$doc.' on '.$date.' at time '.$time.' has been canceled';
        if(!$mail->send()) {
             $warning= 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $query="select * from appointment where patient_id like '$patient_id' and emp_id like '$emp_id' and date like '$date' and time like '$time'";
            $run=mysqli_query($connect,$query);
            $row=mysqli_fetch_assoc($run);
            $query="delete from appointment where patient_id like '$patient_id' and emp_id like '$emp_id' and date like '$date' and time like '$time'";
            $run=mysqli_query($connect,$query);
            $success='Selected appointments were cancelled.';
        }
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php 
   include("head.php");
   ?><script>
  $(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
      orientation:"top",
      startDate:'0',
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
    <div class="container well" style="width: 80%;">
    <?php
           if(isset($warning)){ ?>
            <div class="alert alert-warning alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $warning;?>
            </div><?php
            } ?>
            <?php
           if(isset($success)){ ?>
            <div class="alert alert-success alert-dismissable" >
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <?php echo $success;?>
            </div><?php
            } ?>
    <div class="row">
      <form action="#" method="POST" role="form">
        <legend><center>Manage appoinments</center></legend>
        <div class="form-group col-md-1">
        </div>
        <div class="form-group col-md-3">
          <input type="text" class="form-control" name="date" placeholder="Date">
        </div>
        <div class="form-group col-md-3">
          <input type="text" class="form-control" name="name" placeholder="Doctor's name">
        </div>
        <div class="form-group col-md-3">
          <select name="field" id="input" class="form-control" title="specialist is required" >
            <option value='all'>All</option>
            <optgroup label="Top Specialist">
            <option value="Cardiologist">Cardiologist</option>
            <option value="Nureosurgeon">Nureosurgeon</option>
            <option value="Orthopedician">Orthopedician</option>
            <option value="Oncologist">Oncologist</option>
            <option value="Dentist">Dentist</option>                
            </optgroup>
            <optgroup label="Other Specialist"><hr>
            <option value="Nureologist">Nureologist</option>
            <option value="Psychiatrist">Psychiatrist</option>
            <option value="Pediatrician">Pediatrician</option>
            <option value="Allergist">Allergist</option>
            <option value="Anesthesiologist">Anesthesiologist</option>                
            </optgroup>
          </select>
          </div>
        <button type="submit" class="btn btn-primary col-md-1" name="submit">Submit</button>
      </form>
    </div>
    
    <?php 
      if (isset($query_run)&&isset($_POST['submit'])) {
      if (mysqli_num_rows($query_run)==NULL) {
        echo '<h2 style="margin-left:5%;">No result found</h2>';
      }
      else {
    ?>
    <div style="margin:2%;">
    <div class="row">
      <div class="col-md-3">Doctor</div>
      <div class="col-md-2">Date</div>
      <div class="col-md-1">Time</div>
      <div class="col-md-3">Field</div>
      <div class="col-md-2">Patient</div>
      <div class="col-md-1">&nbsp;</div>
    </div>
    <form action="#" method="POST">
    <?php while($row=mysqli_fetch_assoc($query_run)){ ?>
    <div class="row">
      <div class="col-md-3"><?php echo $row['emp']; ?></div>
      <div class="col-md-2"><?php echo $row['date']; ?></div>
      <div class="col-md-1"><?php echo $row['time']; ?></div>
      <div class="col-md-3"><?php echo $row['field']; ?></div>
      <div class="col-md-2"><?php echo $row['pat'];  ?></div>
      <div class="col-md-1"><input type="checkbox" name="data[]" value="<?php echo $row['emp_id'].' '.$row['patient_id'].' '.$row['date'].' '.$row['time'].' '.$row['emp'];  ?>"></div>
    </div>
    <?php }?>
    <input type="submit" name="cancel-submit" value="Cancel Checked" class="btn btn-primary" style="float: right; margin-right: 5%; margin-top: 5%;">
    </form>
    <?php } } ?>
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