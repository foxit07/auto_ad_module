<?php

namespace frontend\modules\ads\models;

use Yii;

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
}
