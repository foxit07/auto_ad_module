<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@mod' => '/var/www/auto/frontend/modules/ads',
    ],



    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'assetManager' => [
            'appendTimestamp' => false,
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        'assetManager' => [
            'appendTimestamp' => true
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

            ],
        ],
    ],

    'modules' => [
        'ads' => [
            'class' => 'frontend\modules\ads\Ads',
        ],
    ],


];
