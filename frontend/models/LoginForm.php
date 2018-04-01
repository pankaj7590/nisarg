<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Customer;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $email_mobile;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email_mobile', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getCustomer();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email/mobile or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getCustomer(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        Yii::$app->session->setFlash('error', 'Email/Mobile or Password is invalid.');
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getCustomer()
    {
        if ($this->_user === null) {
            // $this->_user = User::findByUsername($this->username);
            $this->_user = Customer::findByEmailMobile($this->email_mobile);
        }

        return $this->_user;
    }
}
