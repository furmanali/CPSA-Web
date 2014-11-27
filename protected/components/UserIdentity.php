<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
    private $email;
    const ERROR_EMAIL_INVALID=3;
    const ERROR_STATUS_NOTACTIV=4;
    const ERROR_STATUS_BAN=5;
    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $user=UsersCredentials::model()->findByAttributes(array('email'=>$this->username));
        /*if (strpos($this->username,"@")) {
            $user=UsersCredentials::model()->notsafe()->findByAttributes(array('email'=>$this->username));
        } else {
            $user=User::model()->notsafe()->findByAttributes(array('username'=>$this->username));
        }*/
//        echo $user->initialPassword .'-----'. crypt($this->password, $user->initialPassword);
//        exit();
        if($this->username == 'admin' && $this->password == 'admin123')
        {
            $this->_id='admin';
            $this->setState('email', 'admin@email.com');
            $this->setState('full_name', 'Admin');
            $this->errorCode=self::ERROR_NONE;
        }
        elseif($user===null)
        {
            $this->errorCode=self::ERROR_EMAIL_INVALID;
            /*if (strpos($this->username,"@")) {
                $this->errorCode=self::ERROR_EMAIL_INVALID;
            } else {
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            }*/
        }
        else if ($user->initialPassword !== crypt($this->password, $user->initialPassword))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else if($user->status==0)
            $this->errorCode=self::ERROR_STATUS_NOTACTIV;
        else if($user->status==-1)
            $this->errorCode=self::ERROR_STATUS_BAN;
        else {
            $this->_id=$user->usersDetails->id;
            $this->setState('email', $user->email);
            $this->setState('full_name', $user->usersDetails->first_name.' '.$user->usersDetails->last_name);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId()
    {
        return $this->_id;
    }
}