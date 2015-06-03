<?php namespace App;

use App\BaseModel;

/* 	public function up()
	{
		Schema::create('roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('permission')->unique();
			$table->string('name', 25)->unique();
			$table->timestamps();
		});
	}
 */
class Role extends BaseModel {
  public $appends = ['list_description','user_ids'];
  public $belongsToManyList = ['users','user_ids'];
  
  // Begin Accessors
  public function getListDescriptionAttribute()
	{
		return $this->permission . ') ' . $this->name;
	}
  
  public function getUserIdsAttribute(){
    return $this->users()->lists('id');
  }
  // End Accessors
  
  // Begin Scopes
  public function scopeDefaultOrder($query)
  {
    return $query->orderBy('permission');
  }
  // End Scopes
  
	public function users()
	{
		return $this->belongsToMany('App\User');
	}
	public function getShowData()
	{
		$showData = [];
		$showData['permission'] = $this->permission;
		$showData['name'] = $this->name;
		$showData['user_ids'] = implode(',',$this->users->lists('name'));
		return $showData;
	}
	public static function getFormData()
	{
		
		$formData = [];
		$formData['permission'] = ['type'=>'text'];
		$formData['name'] = ['type'=>'text'];
		$formData['user_ids'] = ['type'=>'checkbox','list'=>User::all()->lists('name','id')];
		
		return $formData;
	}
	
	public static function getLabel($label)
	{
		$labels = [
						'permission'=>'Permission Level',
						'name'=>'Name',
						'user_ids'=>'Users'
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
