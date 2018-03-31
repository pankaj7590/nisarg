<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "membership".
 *
 * @property int $id
 * @property string $name
 * @property string $information
 * @property int $type
 * @property double $discount
 * @property int $status
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property MembershipCustomer[] $membershipCustomers
 */
class Membership extends \yii\db\ActiveRecord
{
	const TYPE_PLATINUM = 1;
	const TYPE_GOLD = 2;
	const TYPE_SILVER = 3;
	const TYPE_BRONZE = 4;
	
	public static $types = [
		self::TYPE_PLATINUM => 'Platinum',
		self::TYPE_GOLD => 'Gold',
		self::TYPE_SILVER => 'Silver',
		self::TYPE_BRONZE => 'Bronze',
	];
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'membership';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type', 'discount'], 'required'],
            [['type', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['discount'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['information'], 'string'],
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
            'name' => 'Name',
            'information' => 'Information',
            'type' => 'Type',
            'discount' => 'Discount',
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
    public function getMembershipCustomers()
    {
        return $this->hasMany(MembershipCustomer::className(), ['membership_id' => 'id']);
    }
}
