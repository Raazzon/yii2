<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath='@bower/backend/';
    public $css = [
        //'css/site.css',
    //    'bootstrap/css/bootstrap.min.css',
        'plugins/font-awesome/css/font-awesome.min.css',
        'plugins/Ionicons/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
        'dist/css/skins/_all-skins.min.css',
        'plugins/iCheck/square/blue.css',
        'plugins/morris.js/morris.css',
        'plugins/jvectormap/jquery-jvectormap.css',
        'plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css',
        'plugins/bootstrap-daterangepicker/daterangepicker.css',
        'plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'
    ];
    public $js = [
        //'js/main.js',
    //    'plugins/jQuery/jQuery-2.1.4.min.js',
   //     'bootstrap/js/bootstrap.min.js',
        'plugins/iCheck/icheck.min.js',
        'dist/js/adminlte.min.js',
        'dist/js/pages/dashboard.js',
        'dist/js/demo.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
