<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\web\UploadedFile;
use common\components\MediaUploader;

/**
 * This is the model class for table "facility".
 *
 * @property int $id
 * @property int $type
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
 * @property FacilityType $type0
 * @property Media $coverImage
 * @property Media $iconImage
 * @property User $createdBy
 * @property User $updatedBy
 * @property Gallery[] $galleries
 * @property OrderComponent[] $orderComponents
 */
class Facility extends \yii\db\ActiveRecord
{
	public $iconImageFile, $coverImageFile;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'facility';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'icon_image', 'cover_image', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['iconImageFile', 'coverImageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,png'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['charges'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => FacilityType::className(), 'targetAttribute' => ['type' => 'id']],
            [['cover_image'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['cover_image' => 'id']],
            [['icon_image'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['icon_image' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
			$image = UploadedFile::getInstance($this, 'iconImageFile');
			if($image){
				if($image != null && !$image->getHasError()) {
					if($mediaDetails = MediaUploader::uploadFiles($image)){
						$this->icon_image = $mediaDetails['media_id'];
					}
				}
			}
			$image = UploadedFile::getInstance($this, 'coverImageFile');
			if($image){
				if($image != null && !$image->getHasError()) {
					if($mediaDetails = MediaUploader::uploadFiles($image)){
						$this->cover_image = $mediaDetails['media_id'];
					}
				}
			}
            return true;
        } else {
            return false;
        }
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
            'type' => 'Type',
            'icon_image' => 'Icon Image',
            'cover_image' => 'Cover Image',
            'coverImageFile' => 'Cover Image',
            'iconImageFile' => 'Icon Image',
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
    public function getFacilityType()
    {
        return $this->hasOne(FacilityType::className(), ['id' => 'type']);
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
        return $this->hasMany(Gallery::className(), ['facility_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderComponents()
    {
        return $this->hasMany(OrderComponent::className(), ['facility_id' => 'id']);
    }
}
