<?php namespace App;

use Illuminate\Auth\Authenticatable;
//use Illuminate\Database\Eloquent\Model;
use App\BaseModel;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/* 	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
      $table->integer('theme_id');
      $table->foreign('theme_id')->nullable()->default(10)->unsigned()->references('id')->on('themes');
			$table->rememberToken();
			$table->timestamps();
		});
	} */

class User extends BaseModel implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];
  
  public $appends = ['list_description','role_ids'];
  public $belongsToManyList = ['roles','role_ids'];
  
  // Begin Accessors

  public function getRoleIdsAttribute(){
    return $this->roles()->lists('id');
  }
  // End Accessors
  public function getListDescriptionAttribute()
	{
			return $this->name;
	}
  
  public function scopeDefaultOrder($query)
  {
    return $query->orderBy('email');
  }
  
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function projects()
	{
		return $this->belongsToMany('App\Project');
	}
  
  public function createdTasks()
  {
    return $this->hasMany('App\Task','created_by_id');
  }
  
  public function assignedTasks()
  {
    return $this->belongsToMany('App\TaskItem','task_item_user','task_item_id','user_id');
  }
  
  public function createdBugs()
  {
    return $this->hasMany('App\Bug','created_by_id');
  }
	
	public function roles()
	{
		return $this->belongsToMany('App\Role');
	}
  
  public function theme()
	{
		return $this->belongsTo('App\Theme');
	}
  
	public function getDescription()
	{
		return $this->name;
	}
	
	public function isADbAdmin()
	{
		return in_array('DB Admin',$this->roles()->lists('name'));
	}

	public function isAnAdmin()
	{
		return in_array('Admin',$this->roles()->lists('name'));
	}
	
	public function isAConsultant()
	{
		return in_array('Consultant',$this->roles()->lists('name'));
	}
	
	public function isAClient()
	{
		return in_array('Client',$this->roles()->lists('name'));
	}
	
	public function isADeveloper()
	{
		return in_array('Developer',$this->roles()->lists('name'));
	}

	public function isAPublic()
	{
		return in_array('Public',$this->roles()->lists('name'));
	}
  
  public function getShowData()
	{
		$showData = [];
		$showData['name'] = $this->name;
    $showData['email'] = $this->email;
		$showData['role_ids'] = implode(',',$this->roles->lists('name'));
		return $showData;
	}
	public static function getFormData()
	{
		
		$formData = [];
		$formData['name'] = ['type'=>'text'];
    $formData['email'] = ['type'=>'text'];
		$formData['role_ids'] = ['type'=>'checkbox','list'=>Role::all()->lists('name','id')];
		
		return $formData;
	}
	
	public static function getLabel($label)
	{
		$labels = [
						'name'=>'Name',
            'email'=>'Email',
						'role_ids'=>'Roles'
					];
						
		if(array_key_exists($label,$labels))
		{
			return $labels[$label];
		}
		else 
		{
			return $label;
		}
	}
}
