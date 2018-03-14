<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property int $feedback_type
 * @property int $room_type
 * @property int $facility_type
 * @property string $message
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['feedback_type', 'room_type', 'facility_type', 'status', 'created_at', 'updated_at'], 'integer'],
            [['message'], 'string'],
            [['name', 'surname', 'email'], 'string', 'max' => 255],
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
            'surname' => 'Surname',
            'email' => 'Email',
            'feedback_type' => 'Feedback Type',
            'room_type' => 'Room Type',
            'facility_type' => 'Facility Type',
            'message' => 'Message',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
