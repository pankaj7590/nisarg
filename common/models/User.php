<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property string $phone
 * @property int $created_by
 * @property int $updated_by
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
* @property Booking[] $bookings
* @property Booking[] $bookings0
* @property Customer[] $customers
* @property Customer[] $customers0
* @property Facility[] $facilities
* @property Facility[] $facilities0
* @property FacilityType[] $facilityTypes
* @property FacilityType[] $facilityTypes0
* @property Gallery[] $galleries
* @property Gallery[] $galleries0
* @property GalleryMedia[] $galleryMedia
* @property GalleryMedia[] $galleryMedia0
* @property Membership[] $memberships
* @property Membership[] $memberships0
* @property MembershipCustomer[] $membershipCustomers
* @property MembershipCustomer[] $membershipCustomers0
* @property NewsEvent[] $newsEvents
* @property NewsEvent[] $newsEvents0
* @property Order[] $orders
* @property Order[] $orders0
* @property OrderComponent[] $orderComponents
* @property OrderComponent[] $orderComponents0
* @property Room[] $rooms
* @property Room[] $rooms0
* @property RoomType[] $roomTypes
* @property RoomType[] $roomTypes0
* @property Setting[] $settings
* @property Setting[] $settings0
* @property Media $profilePicture
* @property User $createdBy
* @property User[] $users
* @property User $updatedBy
* @property User[] $users0
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
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
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
           [['profile_picture', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
           [['name', 'username', 'auth_key', 'password_hash', 'email', 'phone'], 'required'],
           [['name', 'username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
           [['auth_key'], 'string', 'max' => 32],
           [['phone'], 'string', 'max' => 20],
           [['username'], 'unique'],
           [['email'], 'unique'],
           [['password_reset_token'], 'unique'],
           [['profile_picture'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['profile_picture' => 'id']],
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
           'profile_picture' => 'Profile Picture',
           'name' => 'Name',
           'username' => 'Username',
           'auth_key' => 'Auth Key',
           'password_hash' => 'Password Hash',
           'password_reset_token' => 'Password Reset Token',
           'email' => 'Email',
           'phone' => 'Phone',
           'status' => 'Status',
           'created_by' => 'Created By',
           'updated_by' => 'Updated By',
           'created_at' => 'Created At',
           'updated_at' => 'Updated At',
		];
	}

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by email/mobile
     *
     * @param string $email_mobile
     * @return static|null
     */
    public static function findByEmailMobile($email_mobile)
    {
		$user = static::findOne(['email' => $email_mobile, 'status' => self::STATUS_ACTIVE]);
		if($user){
			return $user;
		}else{
			return static::findOne(['phone' => $email_mobile, 'status' => self::STATUS_ACTIVE]);
		}
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
	
	/** @return \yii\db\ActiveQuery
    */
   public function getBookings()
   {
       return $this->hasMany(Booking::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getBookings0()
   {
       return $this->hasMany(Booking::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getCustomers()
   {
       return $this->hasMany(Customer::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getCustomers0()
   {
       return $this->hasMany(Customer::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getFacilities()
   {
       return $this->hasMany(Facility::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getFacilities0()
   {
       return $this->hasMany(Facility::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getFacilityTypes()
   {
       return $this->hasMany(FacilityType::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getFacilityTypes0()
   {
       return $this->hasMany(FacilityType::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getGalleries()
   {
       return $this->hasMany(Gallery::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getGalleries0()
   {
       return $this->hasMany(Gallery::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getGalleryMedia()
   {
       return $this->hasMany(GalleryMedia::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getGalleryMedia0()
   {
       return $this->hasMany(GalleryMedia::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMemberships()
   {
       return $this->hasMany(Membership::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMemberships0()
   {
       return $this->hasMany(Membership::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMembershipCustomers()
   {
       return $this->hasMany(MembershipCustomer::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getMembershipCustomers0()
   {
       return $this->hasMany(MembershipCustomer::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getNewsEvents()
   {
       return $this->hasMany(NewsEvent::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getNewsEvents0()
   {
       return $this->hasMany(NewsEvent::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrders()
   {
       return $this->hasMany(Order::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrders0()
   {
       return $this->hasMany(Order::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrderComponents()
   {
       return $this->hasMany(OrderComponent::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getOrderComponents0()
   {
       return $this->hasMany(OrderComponent::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getRooms()
   {
       return $this->hasMany(Room::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getRooms0()
   {
       return $this->hasMany(Room::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getRoomTypes()
   {
       return $this->hasMany(RoomType::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getRoomTypes0()
   {
       return $this->hasMany(RoomType::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getSettings()
   {
       return $this->hasMany(Setting::className(), ['created_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getSettings0()
   {
       return $this->hasMany(Setting::className(), ['updated_by' => 'id']);
   }
   /**
    * @return \yii\db\ActiveQuery
    */
   public function getProfilePicture()
   {
       return $this->hasOne(Media::className(), ['id' => 'profile_picture']);
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
   public function getUsers()
   {
       return $this->hasMany(User::className(), ['created_by' => 'id']);
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
   public function getUsers0()
   {
       return $this->hasMany(User::className(), ['updated_by' => 'id']);
   }
}
