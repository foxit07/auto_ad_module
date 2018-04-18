<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
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
            ],
        ],

    ],
    'params' => $params,
];
