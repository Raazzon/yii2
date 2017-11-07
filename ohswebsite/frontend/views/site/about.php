<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
//$this->params['breadcrumbs'][] = $this->title;
?>
 <div class="content-first col-md-12">
             
            <div class="container">

                  <div class="text-content-first col-sm-3" style="color:#0000FF">
                    <h3>List of Employee</h3>
                <?php
                foreach($query as $employee){
                    echo $employee->name;
                    echo"<br/>";
                
                }
                ?>
                  </div>
                       <div class="text-content-first col-sm-3" style="color:#F000FF">
                    <h3>List of Address</h3>
                <?php
                foreach($query as $employee){
                    echo $employee->address;
                    echo"<br/>";
                }
                ?>
                  </div>
                         <div class="text-content-first col-sm-3">
                    <h3>List of Phone</h3>
                <?php
                foreach($query as $employee){
                    echo $employee->phone;
                    echo"<br/>";
                }
                ?>
                  </div>
                         <div class="text-content-first col-sm-3">
                    <h3>List ofField</h3>
                <?php
                foreach($query as $employee){
                    echo $employee->field;
                    echo"<br/>";
                }
                ?>
                  </div>
                
                    </div>
              
            </div>
          
