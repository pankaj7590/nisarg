<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $booking_id
 * @property double $discount
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Customer $customer
 * @property User $createdBy
 * @property User $updatedBy
 * @property OrderComponent[] $orderComponents
 */
class Order extends \yii\db\ActiveRecord
{
	const STATUS_PENDING = 1;
	const STATUS_ACTIVE = 2;
	const STATUS_CANCELLED = 3;
	const STATUS_COMPLETE = 4;
	
	public static $statuses = [
		self::STATUS_PENDING => 'Pending',
		self::STATUS_ACTIVE => 'Active',
		self::STATUS_CANCELLED => 'Cancelled',
		self::STATUS_COMPLETE => 'Complete',
	];
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id'], 'required'],
            [['customer_id', 'booking_id'], 'unique', 'skipOnError' => true, 'targetAttribute' => ['customer_id', 'booking_id']],
            [['customer_id', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['discount'], 'number'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
            [['booking_id'], 'exist', 'skipOnError' => true, 'targetClass' => Booking::className(), 'targetAttribute' => ['booking_id' => 'id']],
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
            'customer_id' => 'Customer',
            'booking_id' => 'Booking',
            'discount' => 'Discount',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'nettotal' => 'Net Total',
        ];
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
    public function getBooking()
    {
        return $this->hasOne(Booking::className(), ['id' => 'booking_id']);
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
    public function getOrderComponents()
    {
        return $this->hasMany(OrderComponent::className(), ['order_id' => 'id']);
    }
	
	public function getTotal(){
		return $this->getOrderComponents()->sum('charges');
	}
	
	public function getNettotal(){
		return $this->getTotal() - $this->discount;
	}
}
