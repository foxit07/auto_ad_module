<?php
/**
 * Created by PhpStorm.
 * User: David Arakelyan
 * Email: rotokan2@gmail.com
 * Date: 17.04.2018
 * Time: 10:17
 */
namespace frontend\modules\ads\assets;
use yii\web\AssetBundle;

class ModuleAssets extends AssetBundle
{

    public $sourcePath = __DIR__;

    /*public function __construct()
    {
       print_r($this->sourcePath); die;
    }*/

    public $js = [
        'resources/js/scripts.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}