<?php

namespace frontend\modules\ads\models\entity\image;
use frontend\modules\ads\models\entity\advert\Advert;
use yii\web\UploadedFile;
use frontend\modules\ads\components\Storage;

use Yii;

/**
 * This is the model class for table "images".
 *
 * @property int $id
 * @property string $path
 * @property int $id_advert
 */
class Image extends \yii\db\ActiveRecord
{

    public $picture;
    public $storage;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    public function init()
    {
        parent::init();
        $this->storage = new Storage();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_advert'], 'integer'],
            [['path'], 'string', 'max' => 255],
            [['picture'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','maxFiles' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'path' => 'Path',
            'id_advert' => 'Id Advert',
        ];
    }
    public function getImg()
    {
        return $this->hasMany(Advert::className(),['id' => 'id_advert']);
    }

    public function upload()
    {
        echo '<pre>';
        $fileName = null;
        $this->picture = UploadedFile::getInstances($this, 'picture');
        foreach ($this->picture as $file) {
            $fileName[] = $this->storage->saveUploadedFile($file);
        }
        return $fileName;
    }

    public function saveRelation($id)
    {
        $fileNames = $this->upload();

        foreach ($fileNames as $fileName){
           $img = new self;
           $img->path = $fileName;
           $img->id_advert = $id;
           $img->save(false);
        }

    }
}
