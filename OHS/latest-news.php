
<?php
include("include/dbconnection.php");
?>
<!DOCTYPE html>
<html>
<head>
   <?php include("include/head.php"); ?>
   <title>News</title>
<style type="text/css" media="screen">
.news-block{
margin:30px auto 10px auto;
}
.news-body{
padding:10px;
} 
.more-news{
padding:13px;
} 
body{
    background-color: #f1f1f1;
   }
   .headline{
    color:#0b3c5d; 
    font-weight:bold;
   font-size:35px;
   margin: 50px auto 10px auto;
   }
   .newsp{
      font-size:20px;
      font-family: Arial Narrow, sans-serif;
   margin: 4px auto 23px auto;
   
   }
   .news-box{
      padding: 15px 15px 15px 15px;
      }
      .news-box-content{background:#f0f0f0; height:500px; padding:2px 2px 10px 1px;
    }
</style>
</head>
<body >
 <?php include('include/header.php'); ?>
<!--main navigation part with logo-->
 <!--contaiener of services options-->
<div class="bg-color">
<?php
include("include/navig.php");
?> 
<h1 class="news-headline text-center headline" ><span style="border-bottom:ridge 1px grey;">LATEST NEWS</span></h1>
<p class="text-center newsp" id="newsparag">Read our latest news from the company or general medical news.Feel free to ask questions in <br>comments for any news you find interesting.

</p>
<div class="container">
<?php 
$query="select * from news order by date DESC ";
$query_run=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($query_run)){;
?>
<div class="col-xs-12 col-sm-4 col-lg-4 news-box">
    <div class="news-box-content" id="news-box-contents">
    <!-- for images-->
    <div class="" style="height:220px;background:white;"> 
         <?php echo" <img src='images/newsImg/".$row['image']." ' style='max-width:100%; max-height:100%;display: block;  margin: 0 auto;'>";?>

    </div>  
     <!-- for date and author-->
    <div class="text-muted text-capitalize " style="margin:3px 0px 3px 0px; padding:5px 1px 2px 14px;">    
    <?php 
    echo '<span class="fa fa-calendar-o ">&nbsp</span>';
    echo $row['date'];
    echo " / ";
    echo '<span class="fa fa-user ">&nbsp</span>';
    echo $row['author']; 
    ?>
    </div>

     <!-- for title-->
    <div class="text-capitalize " style="margin:2px 0px 2px 0px; padding:0px 10px 0px 10px;">
    <span style="font-size:25px; font-weight:600;">
    <a href="news.php?id=<?php echo $row['news_id'];?>" style="text-decoration:none; color:#000;">
    <?php
    echo $row['title'];
    ?>
    </a>
    </span>
    </div>
     <!-- for paragraph-->
    <div class="" style="margin:2px 0px 2px 0px; padding:0px 10px 0px 10px;">
    <p style="font-family: Arial Narrow, sans-serif; font-size:17px;"><?php echo substr($row['detail'],0,300);?>...<a href="news.php?id=<?php echo $row['news_id'];?>">Read more</a></p>
    </div>
    </div>
</div>

<?php } ?>
</div>