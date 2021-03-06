<?php

namespace frontend\modules\ads\models\entity\model;

use Yii;
use frontend\modules\ads\models\entity\mark\Mark;

/**
 * This is the model class for table "models".
 *
 * @property int $id
 * @property string $name
 * @property int $id_mark
 */
class Model extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_mark'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'required']
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
            'id_mark' => 'Id Mark',
        ];
    }
    
    public function getMark()
    {
        return $this->hasOne(Mark::classname(), ['id' => 'id_mark']);
    }

}
