Yii2 Material Assets
=====================

*Material UI for Yii2 Framework, based on [Creative Tim Material Dashboard](https://www.creative-tim.com/product/material-dashboard)*

 !["CT material dashboard"](https://s3.amazonaws.com/creativetim_bucket/products/50/original/opt_md_thumbnail.jpg?1522232645)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer require paskuale75/yii2-material-assets "dev-master"
```

or add

```
"paskuale75/yii2-material-assets": "dev-master"
```

to the require section of your `composer.json` file.


Quick Start
-----------

Once the extension is installed, you can have a **preview** by reconfiguring the path mappings of the view component:

```php
'components' => [
    'view' => [
        'theme' => [
            'pathMap' => [
                '@app/views' => '@vendor/spl/yii2-material-assets/template/material-dashboard/view'
            ],
        ],
    ],
],
```

>Don't forget to remove `'yii\bootstrap\BootstrapAsset'` and `'yii\bootstrap\BootstrapPluginAsset'` from `common\asset\AppAsset`(advence) or `app\asset\AppAsset`(basic)


Customization
-------------

- Copy files from `vendor/spl/yii2-material-assets/template/material-dashboard/view` 
- Remove the custom `view` configuration from your application by deleting the path mappings, if you have made them before.

-----

### Web-font usage

Copy-paste the stylesheet <link> into your <head> before all other stylesheets to load the Fonts and Icons.

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

----

### Config template

Default config.
```php
[
    'siteTitle' = 'Material Dashboard',
    'sidebarColor' => 'rose', // "purple | azure | green | orange | danger | rose"
    'sidebarBackgroundColor' => 'black', // "black | white"
    'sidebarBackgroundImage' => 'template/material-dashboard/img/sidebar-1.jpg'
]
```


 You can change it in config file.
```php
'components' => [
    'assetManager' => [
        'bundles' => [
            'spl\web\MaterialDashboardAsset' => [
		'siteTitle' = 'Your Site Name',
                'sidebarColor' => 'rose',
                'sidebarBackgroundColor' => 'black',
		'sidebarBackgroundImage' => 'img url'
            ],
        ],
    ],
],
```
or

using bundled assets

```php
    Yii::$container->set(
        MaterialDashboardAsset::className(),
        [
	    'siteTitle' = 'Your Site Name',
	    'sidebarColor' => 'rose',
	    'sidebarBackgroundColor' => 'black', 
	    'sidebarBackgroundImage' => 'img url'
        ]
    );
```

-----

### Sidebar menu - Widget Menu

```php
        $menu = SPLmenu::widget(
            [
                'items' => [
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site/index']],
                    [
                        'label' => 'Multi Level Collapse',
                        'icon' => 'swap_vertical_circle',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Level One', 'url' => '#',],
                            [
                                'label' => 'Level Two',
                                'icon' => 'swap_vertical_circle',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Three', 'url' => '#',],
                                    ['label' => 'Level Three', 'url' => '#',],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Some tools',
                        'icon' => 'build',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'settings_input_composite', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'bug_report', 'url' => ['/debug'],],
                        ],
                    ],
                ],
            ]
        );
```

create menu.php in `common\models`(advence) or `app\models`(basic) if you configuring the path mappings of the view component

example:
```php
<?php
namespace common\models;

use Yii;
use spl\widgets\Menu as SPLmenu;

class Menu  
{
    static function getMenu() {
        $menu = SPLmenu::widget(
            [
                'items' => [
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site/index']],
                    [
                        'label' => 'Multi Level Collapse',
                        'icon' => 'swap_vertical_circle',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Level One', 'url' => '#',],
                            [
                                'label' => 'Level Two',
                                'icon' => 'swap_vertical_circle',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Three', 'url' => '#',],
                                    ['label' => 'Level Three', 'url' => '#',],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Some tools',
                        'icon' => 'build',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'settings_input_composite', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'bug_report', 'url' => ['/debug'],],
                        ],
                    ],
                ],
            ]
        );
        return $menu;
    }

}

```
By default to icons will be added prefix of [Material Icon](https://material.io/tools/icons/)

----

### Notification : Noti widget

This is the Noti widget and  Yii 2 enhanced wrapper for the [Bootstrap Notify plugin](https://github.com/mouse0270/bootstrap-notify)

Usage

Add widget to your `layout/main` :
```php
use spl\widgets\Noti;

<?= Noti::widget(); ?>
```

Noti widget renders a message from session flash. All flash messages are displayed
in the sequence they were assigned using setFlash. You can set message as following:

Set the message in your action, for example:

```php
Yii::$app->session->setFlash('success', 'This is the success');
Yii::$app->session->setFlash('info', 'Your info');
Yii::$app->session->setFlash('warning', 'Your warning');
Yii::$app->session->setFlash('error', 'Your error');
```

Also, you can set multiple messages as follows:
 
```php
Yii::$app->session->setFlash('info', ['message 1', 'message 2']);
```

Render message without the session flash 
```php
<?= spl\widgets\Noti::widget([
    'useSessionFlash' => false,
    'options' => [
        'message' => 'Your message',
    ],
    'clientOptions' => [
        'type' => 'info', // "error | warning | info | success | danger "
    ]
]); ?>
```



## TO DO

- [ ] [template] add other material template ( backend & frontend )
- [ ] [widgets] add widget for material template ( each template )
- [ ] theme provider