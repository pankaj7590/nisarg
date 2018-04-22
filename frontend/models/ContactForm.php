<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Feedback;
use yii\web\ServerErrorHttpException;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
			
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],
			['name', 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Name can only contain characters.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
		$transaction = Yii::$app->db->beginTransaction();
		try{
			$model = new Feedback();
			$model->feedback_type = Feedback::TYPE_CONTACT;
			$model->name = $this->name;
			$model->email = $this->email;
			$model->message = $this->body;
			if(!$model->save(false)){
				throw new ServerErrorHttpException('Contact not saved. Please try again.');
			}
			$transaction->commit();

			return Yii::$app->mailer->compose()
				->setTo($email)
				->setFrom([$this->email => $this->name])
				->setSubject($this->subject)
				->setTextBody($this->body)
				->send();
		}catch(Exception $e){
			$transaction->rollBack();
			throw new ServerErrorHttpException('Contact not saved. Please try again.');
		}
    }
}
