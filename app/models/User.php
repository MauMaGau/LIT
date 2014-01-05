<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	protected $guarded = array(
		'id',
		'created_at',
		'updated_at',
	);

	/*
		Validation rules, access by self::rules($id)
	*/
	protected static $rules = array(
		'email' => 'email|unique:users,email',
		'password' => 'min:6',
		'active' => 'in:y,n',
		'last_seen' => 'date',
		'created_at' => 'date',
		'updated_at' => 'date',
	);

	/*
		Get the rules array, and inject the id for the unqiue email rule
	*/
	public static function rules($id=null)
	{
		if($id !== null){
			self::$rules['email'] .= ','.$id;
		}else{
			// If this is a new user, a password is required
			self::$rules['password'] .= '|required';
		}
		return self::$rules;
	}

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	public function getActiveAttribute($value)
	{
		return $value === 'y';
	}

	public function setActiveAttribute($value)
	{
		$this->attributes['active'] = $value ? 'y' : 'n';
	}

	public function setPasswordAttribute($value)
	{
		// We may be passing an empty string from a form if we don't want to change the password
		if(!empty($value)){
			// And we should always hash it, so let's do it automatically
			$this->attributes['password'] = Hash::make($value);
		}
	}

}