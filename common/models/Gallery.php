<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\web\UploadedFile;
use common\components\MediaUploader;

/**
 * This is the model class for table "gallery".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $type
 * @property int $room_id
 * @property int $facility_id
 * @property int $room_type_id
 * @property int $facility_type_id
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Facility $facility
 * @property FacilityType $facilityType
 * @property Room $room
 * @property RoomType $roomType
 * @property User $createdBy
 * @property User $updatedBy
 * @property GalleryMedia[] $galleryMedia
 */
class Gallery extends \yii\db\ActiveRecord
{
	public $galleryPictures;
	
	const STATUS_SHOW = 1;
	const STATUS_HIDE = 0;
	
	public static $statuses = [
		self::STATUS_SHOW => 'Show',
		self::STATUS_HIDE => 'Hide',
	];
	
	const TYPE_ROOM = 1;
	const TYPE_FACILITY = 2;
	const TYPE_ROOM_TYPE = 3;
	const TYPE_FACILITY_TYPE = 4;
	
	public static $types = [
		self::TYPE_ROOM => 'Room',
		self::TYPE_FACILITY => 'Facility',
		self::TYPE_ROOM_TYPE => 'Room Type',
		self::TYPE_FACILITY_TYPE => 'Facility Type',
	];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['galleryPictures'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,png', 'maxFiles'=>0],
            [['type', 'room_id', 'facility_id', 'room_type_id', 'facility_type_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['facility_id'], 'exist', 'skipOnError' => true, 'targetClass' => Facility::className(), 'targetAttribute' => ['facility_id' => 'id']],
            [['facility_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => FacilityType::className(), 'targetAttribute' => ['facility_type_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::className(), 'targetAttribute' => ['room_id' => 'id']],
            [['room_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoomType::className(), 'targetAttribute' => ['room_type_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }
	
    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes)
    {
        if (parent::beforeSave($insert, $changedAttributes)) {
			$images = UploadedFile::getInstances($this, 'galleryPictures');
			foreach($images as $image){
				if($image){
					if($image != null && !$image->getHasError()) {
						if($mediaDetails = MediaUploader::uploadFiles($image)){
							$galleryMedia = new GalleryMedia();
							$galleryMedia->gallery_id = $this->id;
							$galleryMedia->media_id = $mediaDetails['media_id'];
							$galleryMedia->save();
						}
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
            'name' => 'Name',
            'description' => 'Description',
            'type' => 'Type',
            'room_id' => 'Room',
            'facility_id' => 'Facility',
            'room_type_id' => 'Room Type',
            'facility_type_id' => 'Facility Type',
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
    public function getFacility()
    {
        return $this->hasOne(Facility::className(), ['id' => 'facility_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilityType()
    {
        return $this->hasOne(FacilityType::className(), ['id' => 'facility_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::className(), ['id' => 'room_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomType()
    {
        return $this->hasOne(RoomType::className(), ['id' => 'room_type_id']);
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
    public function getGalleryMedia()
    {
        return $this->hasMany(GalleryMedia::className(), ['gallery_id' => 'id']);
    }
	
	public function getFirstImage(){
		return $this->hasOne(GalleryMedia::className(), ['gallery_id' => 'id']);
	}
}
