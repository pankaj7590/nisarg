<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use common\models\Customer;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $username;
    public $email;
    public $phone;
    public $password;
    public $captcha;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],
			['name', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Name can only contain characters.'],
			
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
			
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'max' => 10],
            ['phone', 'number'],
            ['phone', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'This phone number has already been taken.'],
			
            ['captcha', 'required'],
            ['captcha', 'captcha'],
        ];
    }

    /**
     * Signs customer up.
     *
     * @return Customer|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $customer = new Customer();
        $customer->username = $this->username;
        $customer->name = $this->name;
        $customer->email = $this->email;
        $customer->phone = $this->phone;
        $customer->setPassword($this->password);
        $customer->generateAuthKey();
        $customer->save();
        return $customer->save() ? $customer : null;
    }
}
