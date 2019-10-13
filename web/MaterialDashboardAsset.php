<?php

namespace paskuale75\web;

use Yii;
use yii\base\Exception;
use yii\web\AssetBundle as BaseMDAsset;
/**
 * MaterialDashboard AssetBundle
 * @since 0.1
 */
class MaterialDashboardAsset extends BaseMDAsset
{
    public $sourcePath = '@vendor/spl/yii2-material-assets/template/material-dashboard';

    public $css = [
        'css/style.css',
        'css/material-dashboard.min.css',
    ];
    
    public $js = [
        'js/core/jquery.min.js',
        'js/core/popper.min.js',
        'js/core/bootstrap-material-design.min.js',
        'js/plugins/chartist.min.js',
        'js/plugins/bootstrap-notify.js',
        'js/plugins/perfect-scrollbar.jquery.min.js',
        'js/material-dashboard.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];


    public $siteTitle = 'Material Dashboard';
    public $sidebarColor = 'rose';
    public $sidebarBackgroundColor = 'black';
    public $sidebarBackgroundImage = '';
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}