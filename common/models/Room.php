<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property int $cover_image
 * @property string $name
 * @property string $description
 * @property int $type
 * @property double $charges
 * @property int $occupancy
 * @property int $beds
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Gallery[] $galleries
 * @property OrderComponent[] $orderComponents
 * @property Media $coverImage
 * @property RoomType $type0
 * @property User $createdBy
 * @property User $updatedBy
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cover_image', 'type', 'occupancy', 'beds', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'charges'], 'required'],
            [['description'], 'string'],
            [['charges'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['cover_image'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['cover_image' => 'id']],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => RoomType::className(), 'targetAttribute' => ['type' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
			'blameable' => [
				'class' => BlameableBehavior::className(),
			],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cover_image' => 'Cover Image',
            'name' => 'Name',
            'description' => 'Description',
            'type' => 'Type',
            'charges' => 'Charges',
            'occupancy' => 'Occupancy',
            'beds' => 'Beds',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(Gallery::className(), ['room_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderComponents()
    {
        return $this->hasMany(OrderComponent::className(), ['room_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCoverImage()
    {
        return $this->hasOne(Media::className(), ['id' => 'cover_image']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(RoomType::className(), ['id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
