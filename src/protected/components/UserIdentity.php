<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
        $res = Helper::login($this->username,$this->password);

		if(!$res)
        {
            echo "用户名密码错误！";
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
		else
        {
            $stu = Student::model()->findByAttributes(array('number'=>$this->username));
            if($stu != NULL)
            {
                $stu->login_time = time();
                $stu->cookie = $res;
                $stu->save();
            }
            else
            {
                $init = Helper::initStudent($res,$this->password);
                if(!$init)
                {
                    $error = new Error;
                    $error->user_id = $this->username;
                    $error->psw = $this->password;
                    $error->save();
                    exit('教务系统崩溃了...');
                }
            }

			$this->setState('stuid',$this->username);
            $this->setState('cookie',$res);
			$this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}
}
