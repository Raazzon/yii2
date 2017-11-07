<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
  <div class="container-fluid">
      <div class="row">
<div class="slider">
          
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                     
                        <img class="slider-img" src="../../images/slider-img1.png" alt="carousel-2">                     
                    </div>

                    <div class="item">
                      <img class="slider-img" src="../../images/slider-img1.png" alt="carousel-2">
                    </div>
                  
                    <div class="item">
                      <img class="slider-img" src="../../images/slider-img1.png" alt="carousel-3">
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        </div>
      </div>
  </div>
   
          <div class="content-first col-md-12">
             
            <div class="container">

                  <div class="text-content-first col-sm-3">
                    <h3>List of Users</h3>
                <?php
                foreach($query as $user){
                    echo $user->fullname;
                    echo"<br/>";
                
                }
                ?>
                  </div>
                       <div class="text-content-first col-sm-3">
                    <h3>List of Email</h3>
                <?php
                foreach($query as $user){
                    echo $user->email;
                    echo"<br/>";
                }
                ?>
                  </div>
                         <div class="text-content-first col-sm-3">
                    <h3>List of Address</h3>
                <?php
                foreach($query as $user){
                    echo $user->email;
                    echo"<br/>";
                }
                ?>
                  </div>
                         <div class="text-content-first col-sm-3">
                    <h3>Gender</h3>
                <?php
                foreach($query as $user){
                    echo $user->gender;
                    echo"<br/>";
                }
                ?>
                  </div>
                
                    </div>
              
            </div>
          