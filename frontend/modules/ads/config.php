<?php

return[
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'rules' => [
                '/backend' => 'ads/backend/advert/index'
            ],
        ],
    ],
];