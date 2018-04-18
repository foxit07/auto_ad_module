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
                /* index */
                '/backend/advert' => 'ads/backend/advert/index',
                '/backend/model' => 'ads/backend/model/index',
                '/backend/mark' => 'ads/backend/mark/index',
                '/backend/option' => 'ads/backend/option/index',


                /* create */
                '/backend/advert/create' => 'ads/backend/advert/create',
                '/backend/model/create' => 'ads/backend/model/create',
                '/backend/mark/create' => 'ads/backend/mark/create',
                '/backend/option/create' => 'ads/backend/option/create',

                /* view */
                '/backend/advert/view' => 'ads/backend/advert/view',
                '/backend/model/view' => 'ads/backend/model/view',
                '/backend/mark/view' => 'ads/backend/mark/view',
                '/backend/option/view' => 'ads/backend/option/view',

                /* update */
                '/backend/advert/update' => 'ads/backend/advert/update',
                '/backend/model/update' => 'ads/backend/model/update',
                '/backend/mark/update' => 'ads/backend/mark/update',
                '/backend/option/update' => 'ads/backend/option/update',


                /* frontend */
                '/frontend/advert' => 'ads/frontend/advert/index',
                '/frontend/create' => 'ads/frontend/advert/create',
                '/frontend/edit' => 'ads/frontend/advert/edit',
                '/advert/models' => 'ads/frontend/advert/models',
            ],
        ],
    ],

    'modules' => [
        'ads' => [
            'class' => 'frontend\modules\ads\Ads',
        ],
    ],


];
