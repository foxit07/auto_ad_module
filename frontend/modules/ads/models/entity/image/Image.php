<?php

namespace frontend\modules\ads\models\entity\image;

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
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_advert'], 'integer'],
            [['path'], 'string', 'max' => 255],
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
}
