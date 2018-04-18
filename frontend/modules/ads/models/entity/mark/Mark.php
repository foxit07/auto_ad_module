<?php

namespace frontend\modules\ads\models\entity\mark;

use Yii;
use frontend\modules\ads\models\entity\model\Model;

/**
 * This is the model class for table "marks".
 *
 * @property int $id
 * @property string $name
 */
class Mark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'marks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getModels()
    {
        return $this->hasMany(Model::className(),['id_mark' => 'id']);
    }
}
