<?php

namespace app\Modules\shipping\models;

use Yii;

/**
 * This is the model class for table "possible_weights".
 *
 * @property int $id
 * @property int $weight
 */
class PossibleWeights extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'possible_weights';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['weight'], 'required'],
            [['weight'], 'integer'],
            [['weight'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'weight' => 'Weight',
        ];
    }
}
