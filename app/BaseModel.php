<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model {
	
  public $appends = ['list_description'];
  public $belongsToManyList = [];
  public $eagerLoadedList = [];
/*   
  // Begin belongsToMany helpers for syncing data
  public $belongsToManyList = ['image_ids','images'];
  
  public function getImageIdsAttribute()
  {
    return $this->images()->lists('id');
  }
  // End belongsToMany helpers
   */
  public function getExcept()
  {
    return array_merge($this->appends,$this->belongsToManyList,$this->eagerLoadedList);
  }

	protected $guarded = [
			"id",
			"created_at",
			"updated_at"
	];
	
	public function nullIfBlank($field)
	{
		return trim($field) !== '' ? $field : null;
	}
	
/* 	public function getDescription()
	{
		return $this->name;
	} */
	
	public function getListDescriptionAttribute()
	{
			return $this->description;
	}
  
  public function scopeDefaultOrder($query)
  {
    return $query->orderBy('id');
  }
  
  public function scopeSelectOrder($query)
  {
    return $this->scopeDefaultOrder($query);
  }
	
	public static function getLabel($label)
	{
		return $label;
	}
	
	public static function displayMap(){
		
		return false;
	}
	

}