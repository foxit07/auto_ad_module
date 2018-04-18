<?php

namespace frontend\modules\ads;
use Yii;
/**
 * ads module definition class
 */
class Ads extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'frontend\modules\ads\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
        Yii::configure($this, require __DIR__ . '/config.php');
    }
}
