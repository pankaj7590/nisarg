<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "facility_type".
 *
 * @property int $id
 * @property int $icon_image
 * @property int $cover_image
 * @property string $name
 * @property string $description
 * @property double $charges
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Booking[] $bookings
 * @property Facility[] $facilities
 * @property Media $coverImage
 * @property Media $iconImage
 * @property User $createdBy
 * @property User $updatedBy
 * @property Gallery[] $galleries
 */
class FacilityType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facility_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['icon_image', 'cover_image', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['charges'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['cover_image'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['cover_image' => 'id']],
            [['icon_image'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['icon_image' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'icon_image' => 'Icon Image',
            'cover_image' => 'Cover Image',
            'name' => 'Name',
            'description' => 'Description',
            'charges' => 'Charges',
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
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['facility_type' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilities()
    {
        return $this->hasMany(Facility::className(), ['type' => 'id']);
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
    public function getIconImage()
    {
        return $this->hasOne(Media::className(), ['id' => 'icon_image']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(Gallery::className(), ['facility_type_id' => 'id']);
    }
}
