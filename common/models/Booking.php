<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property int $checkin_date
 * @property int $checkout_date
 * @property int $booking_type
 * @property int $room_type
 * @property int $facility_type
 * @property int $adults
 * @property int $children
 * @property int $rooms
 * @property string $message
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Customer $customer
 * @property FacilityType $facilityType
 * @property RoomType $roomType
 * @property User $createdBy
 * @property User $updatedBy
 */
class Booking extends \yii\db\ActiveRecord
{
	const STATUS_REQUESTED = 1;
	const STATUS_CONFIRMED = 2;
	const STATUS_CANCELLED = 3;
	
	public static $statuses = [
		self::STATUS_REQUESTED => 'Requested',
		self::STATUS_CONFIRMED => 'Confirmed',
		self::STATUS_CANCELLED => 'Cancelled',
	];
	
	const TYPE_BY_CUSTOMER = 1;
	const TYPE_BY_STAFF = 2;
	
	public static $types = [
		self::TYPE_BY_CUSTOMER => 'By Customer',
		self::TYPE_BY_STAFF => 'By Staff',
	];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['customer_id', 'booking_type', 'room_type', 'facility_type', 'adults', 'children', 'rooms', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['message'], 'string'],
            [['checkin_date', 'checkout_date'], 'safe'],
            [['phone'], 'string', 'max' => 15],
            [['name', 'surname', 'email'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['facility_type'], 'exist', 'skipOnError' => true, 'targetClass' => FacilityType::className(), 'targetAttribute' => ['facility_type' => 'id']],
            [['room_type'], 'exist', 'skipOnError' => true, 'targetClass' => RoomType::className(), 'targetAttribute' => ['room_type' => 'id']],
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
			if($this->checkin_date){
				$this->checkin_date = strtotime($this->checkin_date);
			}
			if($this->checkout_date){
				$this->checkout_date = strtotime($this->checkout_date);
			}
            return true;
        } else {
            return false;
        }
    }
	
	public function afterSave($insert, $changedAttributes){
		if(array_key_exists('status', $changedAttributes) && $this->status == self::STATUS_CONFIRMED){
			$orderModel = new Order();
			$orderModel->customer_id = $this->customer_id;
			$orderModel->booking_id = $this->id;
			$orderModel->status = Order::STATUS_PENDING;
			$orderModel->save();
		}
		return parent::afterSave($insert, $changedAttributes);
	}
	
    /**
     * @inheritdoc
     */
    public function afterFind()
    {	
		if($this->checkin_date){
			$this->checkin_date = Yii::$app->formatter->asDate($this->checkin_date);
		}
		if($this->checkout_date){
			$this->checkout_date = Yii::$app->formatter->asDate($this->checkout_date);
		}
        return parent::afterFind();
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
            'customer_id' => 'Customer',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'checkin_date' => 'Checkin Date',
            'checkout_date' => 'Checkout Date',
            'booking_type' => 'Booking Type',
            'room_type' => 'Room Type',
            'facility_type' => 'Facility Type',
            'adults' => 'Adults',
            'children' => 'Children',
            'rooms' => 'Rooms',
            'message' => 'Message',
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
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['booking_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFacilityType()
    {
        return $this->hasOne(FacilityType::className(), ['id' => 'facility_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomType()
    {
        return $this->hasOne(RoomType::className(), ['id' => 'room_type']);
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
