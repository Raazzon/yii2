<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;

use common\widgets\Alert;

//AppAsset::register($this);
$asset =backend\assets\AppAsset::register($this);
$baseUrl=$asset->baseUrl;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?=$this->render('header.php',['baseUrl'=>$baseUrl])?>
    <?=$this->render('leftmenu.php',['baseUrl'=>$baseUrl])?>
    <?=$this->render('content.php',['content'=>$content])?>
    <?=$this->render('footer.php',['baseUrl'=>$baseUrl])?>
    <?=$this->render('rightside.php',['baseUrl'=>$baseUrl])?>
    
     <div class="control-sidebar-bg"></div>


</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
